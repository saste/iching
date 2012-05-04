<form name="questionForm" id="questionForm" action="getAnswer.php" method="post">
      Type your question here<br>
      <textarea cols="40" rows="5" id="questionTextArea">
      </textarea>
      <br>

      <input type="submit" value="Get answer">
      <input type="button" value="Clear question"
             onclick="$('#questionTextArea').val('');">

      <!-- see which IChing systems are available -->
      <div>
      <?php include "get_iching_radio.php" ?>
      </div>
</form>