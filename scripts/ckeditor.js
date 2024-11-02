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
    ImageBlockEditing,
    List,
    Link,
} = CKEDITOR;

ClassicEditor
    .create(document.querySelector('#editor'), {
        plugins: [
            Essentials, Heading, Bold, Italic, Font, Paragraph, 
            Image, // Ensure Image plugin is included
            ImageCaption, ImageResize, ImageStyle, ImageToolbar, 
            LinkImage, ImageInsert, ImageUpload, SimpleUploadAdapter, 
            ImageEditing, ImageBlockEditing, List, Link,
        ],
        toolbar: [
            'heading', '|',
            'imageInsert', '|',
            'undo', 'redo', '|',
            'bold', 'italic', '|',
            'bulletedList', 'numberedList', '|',
            'link',
        ],
        link: {
            addTargetToExternalLinks: true
        },
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
            uploadUrl: 'http://127.0.0.1/projects/portfolio2/public/scripts/upload_image.php', // Replace with your server URLs
            headers: {
                // Optional: Add headers such as Authorization or CSRF if required
            }
        }
    })
    .then(/* ... */)
    .catch(error => {
        console.error('There was an error initializing the editor:', error);
    });

    console.log(configBaseDir + 'upload_image.php');
