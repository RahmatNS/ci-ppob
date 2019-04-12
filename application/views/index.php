<!DOCTYPE html>
<html lang="en">
<head>
  <title>Deplaza</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
    #operator-info{
      position: absolute;
      top: 6px;
      right: 37px;
    }
    .hidden{
      display: none;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Selamat datang di Deplaza</h2>
  <p>Anda bisa membeli pulsa, bayar listrik, hingga pesan tiket KAI disini </p><hr>

  <ul class="nav nav-pills nav-justified" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" href="#pulsa" role="tab" data-toggle="tab">Pulsa</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#listrik" role="tab" data-toggle="tab">Paket Data</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#listrik" role="tab" data-toggle="tab">Listrik PLN</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#references" role="tab" data-toggle="tab">Lain2</a>
    </li>
  </ul><br>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="pulsa">
      <div class="card">
        <div class="card-header">
          Isi Pulsa Saya
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
               <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Masukkan nomor HP Anda">
               <span id="operator-info"></span>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <select class="form-control" name="" readonly>
                    <option value="" selected>Nominal</option>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Beli">
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">

        </div>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="listrik">
      Ini Halaman Profile
    </div>
    <div role="tabpanel" class="tab-pane fade" id="references">Ini Halaman Setting</div>
  </div>

</div>

<script type="text/javascript">
  $(document).ready(function () {

    $('#nomor').on('input',function(e){
      var nomor = $('#nomor').val();

      if(nomor.length == 4){
        var prefix = nomor.substring(0, 4);
        get_operator(prefix);
      }
    });

    function get_operator(prefix){
      $.ajax({
          url: '<?=base_url('home/get_operator/')?>' + prefix,
          type: 'POST',
          success: function(data){
            var operator = data;
            $('#operator-info').html(data);
            console.log(data);
            get_nominal(operator);
          }
      });
    }

    function get_nominal(operator){
      $.ajax({
          url: '<?=base_url('home/get_nominal/')?>' + operator,
          type: 'POST',
          success: function(data){
            alert(data);
          }
      });
    }

  });
</script>

</body>
</html>