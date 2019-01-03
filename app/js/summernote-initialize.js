$('#summernote').summernote({
	placeholder: '',
	toolbar: [
		['style', ['bold', 'italic', 'underline']],
		['font', ['strikethrough']],
		['para', ['ul', 'ol']]
	],
	tabsize: 2,
	height: 200,
	callbacks: {
      // Clear all formatting of the pasted text
      onPaste: function (e) {
        var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
        e.preventDefault();
        setTimeout( function(){
          document.execCommand( 'insertText', false, bufferText );
        }, 10 );
      }
    }

});