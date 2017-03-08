<!DOCTYPE html>
<html>
<head>
    <title>Include SDK - Using SoundCloud API</title>
    <link rel="stylesheet" href="../../../CLE%203/Project/CSS/soundCloud.css">

</head>
<body>
    <form id="search-new-song" method="post">
        <label for="inputfield">Text</label>
        <input type="song" value="" id="inputfield"/>
        <input type="submit" id="button" value="search song"/>
    </form>
    <ul>
        <li><a href="#" class="genre">dubstep</a></li>
        <li><a href="#" class="genre">Electronic</a></li>
        <li><a href="#" class="genre">punk</a></li>
        <li><a href="#" class="genre">Rock</a></li>
    </ul>
    <ul>
        <li><a href="#" class="artist">Kygo</a></li>
        <li><a href="#" class="artist">The Chainsmokers</a></li>
        <li><a href="#" class="artist">Throttle</a></li>
    </ul>
    <div id="target"></div>

    <script src="//connect.soundcloud.com/sdk.js"></script>
    <script src="JS/SoundCloud.js"></script>
</body>
</html>