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
    config.height = '400px';

    // 画像のサイズ指定をstyleタグではなく，width,height属性で設定
    config.disallowedContent = 'img{width,height}';
    config.extraAllowedContent = 'img[width,height]';

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

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab) {
            var upload = uploadTab.get('upload');
            if (upload) upload.label = '画像を選択してください';

            var uploadButton = uploadTab.get('uploadButton');
            if (uploadButton) uploadButton.label = 'アップロード';
        }

        var infoTab = dialogDefinition.getContents('info');
        if (infoTab) {
            infoTab.remove('txtAlt');
            infoTab.get('txtUrl')['hidden'] = true;
            infoTab.remove('txtHSpace');
            infoTab.remove('txtVSpace');
            infoTab.remove('txtBorder');
            infoTab.remove('cmbAlign');

            var browse = infoTab.get('browse');
            if (browse) browse.label = 'アップロード済みの画像を選択';
        }

        // remove unnecessary tabs
        if (dialogDefinition.getContents('Link')) dialogDefinition.removeContents('Link');
        if (dialogDefinition.getContents('advanced')) dialogDefinition.removeContents('advanced');
    }
});
