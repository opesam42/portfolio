const {
    ClassicEditor,
    Essentials,
    Heading,
    Bold,
    Italic,
    Font,
    Paragraph,
    Image,
    ImageCaption,
    ImageResize,
    ImageStyle,
    ImageToolbar,
    LinkImage,
    ImageInsert,
    ImageUpload,
    SimpleUploadAdapter,
    ImageEditing,
    ImageBlockEditing // Ensure this is correctly imported
} = CKEDITOR;

ClassicEditor
    .create(document.querySelector('#editor'), {
        plugins: [
            Essentials, Heading, Bold, Italic, Font, Paragraph, 
            Image, // Ensure Image plugin is included
            ImageCaption, ImageResize, ImageStyle, ImageToolbar, 
            LinkImage, ImageInsert, ImageUpload, SimpleUploadAdapter, 
            ImageEditing, ImageBlockEditing // Ensure ImageBlockEditing is included
        ],
        toolbar: [
            'heading', '|',
            'imageInsert', '|',
            'undo', 'redo', '|',
            'bold', 'italic', '|',
        ],
        image: {
            toolbar: [
                'imageStyle:block', 'imageStyle:side', '|',
                'toggleImageCaption', 'imageTextAlternative', '|',
                'linkImage'
            ],
            insert: {
                type: 'auto'
            }
        }, 
        simpleUpload: {
            uploadUrl: 'upload_image.php', // Replace with your server URL
            headers: {
                // Optional: Add headers such as Authorization or CSRF if required
            }
        }
    })
    .then(/* ... */)
    .catch(error => {
        console.error('There was an error initializing the editor:', error);
    });
