CKEDITOR.editorConfig = function( config ) {

    config.uploadUrl = '/uploader/upload.php';


    config.toolbarGroups = [
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph',   groups: [ 'list', 'align'] },
        { name: 'links' },
        { name: 'insert', groups: ['youtube'] },
        { name: 'styles'},
        { name: 'colors'},
        { name: 'table'}
    ];


    config.forcePasteAsPlainText = true;

    config.removeButtons = 'Flash,HorizontalRule,Smiley,Iframe,SpecialChar,PageBreak,Format,Font,BGColor';

    config.colorButton_colors = "000000";

    config.filebrowserUploadUrl = '/admin/ckeditor-upload';

};

CKEDITOR.stylesSet.add('default', [

    {name: 'titulo', element: 'h2', styles: {'color':'#269dd6', 'font-family':'Insanibu', 'font-size' : '20px'}},
    {name: 'subtitulo', element: 'span', styles: {'color':'#5b5b5f', 'font-family':'Insanibu', 'font-size' : '19px'}},
    {name: 'citação', element: 'p', styles: {'color':'#0072ba', 'font-family':'Museo', 'font-size' : '16px', 'font-style':'italic'}},
    {name: 'subtitulo salmão', element: 'span', styles: {'color':'#e66367', 'font-family':'Insanibu', 'font-size' : '19px'}},
	{name: 'Insanibu', element: 'span', styles: {'font-family':'Insanibu', 'font-size' : '17px'}}


]);
