<html>
<script type="text/javascript"src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        // čia rašomas JQuery kodas
        $('#contentLeft h3').mouseover(function() { // užvedus pelyte
            $(this).css('cursor', 'pointer'); // pakeičiamas pelytės žymeklis
        });

        $('#contentLeft h3').click(function() { // paspaudus contentLeft h2 elem.
            $('#contentLeft ul').slideToggle(); // slepiamas/rodomas ul meniu elem.
        });
    });
</script>
</html>