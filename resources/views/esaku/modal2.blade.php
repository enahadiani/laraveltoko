<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>
</head>
<body>
    <style>
        .bottom-sheet{
  max-height: 100% !important;
}

.bottom-sheet .modal.content{
  width: 60%; 
  margin: 0px auto
}
    </style>
      <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn" href="#modal1">Modal</a>

<!-- Modal Structure -->
<div id="modal1" class="modal bottom-sheet modal-fixed-footer">
  <div class="modal-content">
    <p>A bunch of text</p>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
  </div>
</div>
<script>
    $('.modal').modal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      inDuration: 300, // Transition in duration
      outDuration: 200, // Transition out duration
      startingTop: '4%', // Starting top style attribute
      endingTop: '10%', // Ending top style attribute
      ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
      //  alert("Ready");
        console.log(modal, trigger);
      },
      complete: function() { //alert('Closed');
      } // Callback for Modal close
    }
  );
</script>
      
</body>
</html>