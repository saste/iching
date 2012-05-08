<form id="questionForm" method="post">
      Type your question here<br>
      <textarea cols="40" rows="5" id="questionTextArea" name="question">
      </textarea>
      <br>

      <input type="submit" value="Get answer">
      <input type="button" value="Clear question"
             onclick="$('#questionTextArea').val('');">

      <!-- see which IChing translations are available -->
      <div>
      <?php include "get-iching-radio.php" ?>
      </div>
</form>
