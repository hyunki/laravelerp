<script src="{{ url('ckeditor/ckeditor.js')   }}"></script>

<script>

    
    // Replace the <textarea id="ckeditor"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'memo' );

    // The "change" event is fired whenever a change is made in the editor.
	CKEDITOR.on( 'change', function( evt ) {
    	// getData() returns CKEditor's HTML content.
    	console.log( 'Total bytes: ' + evt.memo.getData().length );
	});

    

    // Your code to save "data", usually through Ajax.
</script>