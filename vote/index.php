<html>
<head>
    <script>
        function getVote(int) {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else {  // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    document.getElementById("poll").innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","poll_vote.php?vote="+int,true);
            xmlhttp.send();
        }
    </script>
</head>
<body>

<div id="poll">
    <h3>Met welk liedje support jij Feyenoord?</h3>
    <form>
        Liedje 1:
        <input type="radio" name="vote" value="0" onclick="getVote(this.value)">
        <br>Liedje 2:
        <input type="radio" name="vote" value="1" onclick="getVote(this.value)">
        <br>Liedje 3:
        <input type="radio" name="vote" value="2" onclick="getVote(this.value)">
    </form>
</div>

</body>
</html>