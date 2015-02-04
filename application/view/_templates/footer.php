    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
    <!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
    <script>
        var url = "<?php echo URL; ?>";
        var gamephoto_id = "<?php if(isset($this->gamephoto->id)) {echo $this->gamephoto->id;} else {null;} ?>"

    </script>

    <!-- our JavaScript -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZQGjrV7hQyMPy50X8Jy9aRRZlaqmGwUM" type="text/javascript"></script>
    <script src="<?php echo URL; ?>js/application.js"></script>

</body>
</html>
