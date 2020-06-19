<?php
session_start();
$userid = rand(1,1000000) + rand(1,10);
$_SESSION['user'] = $userid;

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="src/bootstrap_original.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <!-- Bootstrap core CSS -->
  <link href="src/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="src/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="src/css/style.css" rel="stylesheet">
  <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  <style>
  body{
    background: #ff0057;
  }

  .file-upload{display:block;text-align:center;font-family: Helvetica, Arial, sans-serif;font-size: 12px;}
  .file-upload .file-select{display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
  .file-upload .file-select .file-select-button{background:#dce4ec;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
  .file-upload .file-select .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
  .file-upload .file-select:hover{border-color:#34495e;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
  .file-upload .file-select:hover .file-select-button{background:#34495e;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
  .file-upload.active .file-select{border-color:#3fa46a;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
  .file-upload.active .file-select .file-select-button{background:#3fa46a;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
  .file-upload .file-select input[type=file]{z-index:100;cursor:pointer;position:absolute;height:100%;width:100%;top:0;left:0;opacity:0;filter:alpha(opacity=0);}
  .file-upload .file-select.file-select-disabled{opacity:0.65;}
  .file-upload .file-select.file-select-disabled:hover{cursor:default;display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;margin-top:5px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
  .file-upload .file-select.file-select-disabled:hover .file-select-button{background:#dce4ec;color:#666666;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
  .file-upload .file-select.file-select-disabled:hover .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
  .heading{
    font-family: times, Times New Roman, times-roman, georgia, serif;
    color: white;
    margin: 0;
    padding: 0px 0px 6px 0px;
    font-size: 51px;
    line-height: 44px;
    letter-spacing: 2px;
    font-weight: bold;
    text-transform: uppercase;
  }
</style>
</head>

<body>

  <div class="container bg-dark text-light z-depth-5 mb-3" style="margin-top:20px;">
    <div class="row">
      <div class="col text-center my-4">
        <hr class="bg-light w-50"><h1 class="heading"> Certificate Generator</h1><hr class="bg-light w-50">
      </div>
    </div>
    <div class="row px-4">
      <div class="col">
        <p></p>
        <button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#basicExampleModal">
          Read me before starting !
        </button>
      </div>
    </div>
    <div class="row px-4 py-2">
      <div class="col">
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <div class="form-row my-3">
            <div class="col">
              <label for="certificate">Upload Image File of the certificate ( jpg Format )</label><br>
              <div class="file-upload" id="fu1">
                <div class="file-select">
                  <div class="file-select-button" id="fileName1">Choose File</div>
                  <div class="file-select-name" id="noFile1">No file chosen...</div>
                  <input type="file" name="file" id="chooseFile1" required>
                </div>
              </div>
            </div>
            <div class="col">
              <label for="sheet">Upload Records (CSV File)</label><br>
              <div class="file-upload" id="fu2">
                <div class="file-select">
                  <div class="file-select-button" id="fileName2">Choose File</div>
                  <div class="file-select-name" id="noFile2">No file chosen...</div>
                  <input type="file" name="sheet" id="chooseFile2" required>
                </div>
              </div>
            </div>
          </div>
          <div class=" row my-3">
            <div class="col">
              <input type="submit" value="Generate Certificate" name="submit" class="btn btn-warning">
            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col">
              <div class="fa-2x">
                <a href="https://github.com/neel6762" class="text-light mx-2"><i class="fab fa-github"></i></a>
                <a href="https://linkedin.com/in/neel6762" class="text-light mx-2"><i class="fab fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Instructions</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    $('#chooseFile1').bind('change', function () {
      var filename = $("#chooseFile1").val();
      if (/^\s*$/.test(filename)) {
        $("#fu1").removeClass('active');
        $("#noFile1").text("No file chosen...");
      }
      else {
        $("#fu1").addClass('active');
        $("#noFile1").text(filename.replace("C:\\fakepath\\", ""));
      }
    });

    $('#chooseFile2').bind('change', function () {
      var filename = $("#chooseFile2").val();
      if (/^\s*$/.test(filename)) {
        $("#fu2").removeClass('active');
        $("#noFile2").text("No file chosen...");
      }
      else {
        $("#fu2").addClass('active');
        $("#noFile2").text(filename.replace("C:\\fakepath\\", ""));
      }
    });
  </script>
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="src/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="src/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="src/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="src/js/mdb.min.js"></script>
</body>
</html>
