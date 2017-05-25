<!DOCTYPE html>
<html>
<head>
    <title>mab.jquery.taginput Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/mab-jquery-taginput.css" />
    <style type="text/css">
        .narrow {
            width: 300px !important;
        }
    </style>
</head>
<body>

    <!-- Static navbar -->



        <div class="form-group">
            <label for="tags2">Pre-populated</label>
            <input type="text" class="form-control tag-input" name="tags2" id="tags2" placeholder="Enter tags" value="cat|dog|catfish|fish">
        </div>

        <div class="form-group">
            <label for="tags2">Callback data</label>
            <pre id="console">Add or remove a tag from one of the inputs above...
            </pre>
        </div>
    <script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="js/mab-jquery-taginput.js"></script>
<script type="text/javascript">

    $(function(){

        // Instantiate the Bloodhound suggestion engine
        var tags = new Bloodhound({
            datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.tag); },
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            local: [
                { tag: 'dog' },
                { tag: 'cat' },
                { tag: 'fish' },
                { tag: 'catfish' },
                { tag: 'dogfish' }
            ]
        });

        tags.initialize();

        // Set up an on-screen console for the demo
        var screenConsole = $('#console');

        // Write callback data to the screen when tags are added or removed in demo inputs
        var logCallbackDataToConsole = function(added, removed) {
            screenConsole.append('Tag Data: ' + (this.val() || null) + ', Added: ' + added + ', Removed: ' + removed + '\n');
        };

        // Create typeahead-enabled tag inputs
        $('.tag-input').tagInput({
            allowDuplicates: false,
            typeahead: true,
            typeaheadOptions: {
                highlight: true
            },
            typeaheadDatasetOptions: {
                display: function(d) { return d.tag; },
                source: tags.ttAdapter()
            },
            onTagDataChanged: logCallbackDataToConsole
        });

        // Create basic tag inputs with no typeahead
        $('.tag-input-basic').tagInput({
            onTagDataChanged: logCallbackDataToConsole
        });

        $('#results a[rel="external"]').attr('target', '_blank');

    });

</script>
</body>
</html>