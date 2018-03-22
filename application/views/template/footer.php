 <script>
			ClassicEditor
				.create( document.querySelector( '#editor1' ),  {
        toolbar: [ 'headings', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo',
            'redo' ],
        heading: {
            options: [
                { modelElement: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { modelElement: 'heading1', viewElement: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { modelElement: 'heading2', viewElement: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
                })
				.then( editor => {
					console.log( editor );
				} )
				.catch( error => {
					console.error( error );
				} );
  
</script>

</div>
</body>
</html>
    
