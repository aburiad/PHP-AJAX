<style>
   div#posts {
      padding-top: 30px;
   }

   div#posts span {
      display: block;
      border: 1px solid green;
      padding: 10px;
      margin-bottom: 5px;
   }
</style>
<form id="myForm" action="jqueryajaxserver.php">
   <input type="text" name="username" placeholder="Your Name">
   <input type="submit" name="submit" value="Submit">
</form>

<div id="result"></div>

<button id="loadmore">Loadmore</button>
<div id="posts"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
   $('#myForm').on('submit', function (event) {
      event.preventDefault();
      var formData = $(this).serialize();

      $.ajax({
         url: 'jqueryajaxserver.php',
         type: 'POST',
         data: formData,
         success: function (response) {
            $('#result').html(response);
         },
         error: function () {
            $('#result').html('Error occurred!');
         }
      });
   });
</script>

<script>
   $('#loadmore').on('click', function () {
      $.ajax({
         url: 'server.php', 
         type: 'POST',
         success: function (response) {
            $('#posts').html(response); // Replace existing data with the new data
         },
         error: function () {
            alert('Error occurred while loading data.');
         }
      });
   });


</script>