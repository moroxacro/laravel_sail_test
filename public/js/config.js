CKEDITOR.editorConfig = function (config) {
    config.toolbar_mini = [
        { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
		{ name: 'clipboard', items: [ 'Undo', 'Redo' ] },
		{ name: 'links', items: [ 'Link', 'Unlink'] },
		{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },
		{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
		{ name: 'styles', items: [ 'Format' ] },
        { name: 'document', items: [ 'Source' ] },
        { name: 'tools', items: [ 'Maximize' ] },
    ];

    // toolbar_mini が読み込まれる
    config.toolbar = "mini";

    // 高さを指定
    config.height = '380px';
};

CKEDITOR.on('dialogDefinition', function (ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'link') {
        var infoTab = dialogDefinition.getContents('info');
        if (infoTab) {
            var urlField = infoTab.get('url');
            urlField['default'] = 'www.example.com';
        }

        if (dialogDefinition.getContents('advanced')) dialogDefinition.removeContents('advanced');
        if (dialogDefinition.getContents('upload')) dialogDefinition.removeContents('upload');
        if (dialogDefinition.getContents('target')) dialogDefinition.removeContents('target');
    }
});