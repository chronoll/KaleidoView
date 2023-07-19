// /sns/public/js/reply.js

window.onload = function() {
    // キャンセルボタンの要素を取得
    var cancelReplyButton = document.querySelector('#cancelReply');

    // キャンセルボタンがクリックされたときの処理を追加
    cancelReplyButton.addEventListener('click', function(event) {
        // フォームの送信を防ぐ
        event.preventDefault();

        // 親コメントのIDをクリア
        var form = document.querySelector('.post_comment');
        form.querySelector('#parentCommentIdField').value = '';

        // フォームを元の位置に戻す
        document.querySelector('#originalFormLocation').append(form);

        // キャンセルボタンを非表示
        cancelReplyButton.style.display = 'none';
    });

    document.querySelectorAll('.reply-button').forEach(function (button) {
        button.addEventListener('click', function () {
            // 親コメントのIDを取得
            var commentId = this.dataset.commentId;

            // 既存のフォームを取得
            var form = document.querySelector('.post_comment');

            // 隠しフィールドに親コメントのIDを設定
            form.querySelector('#parentCommentIdField').value = commentId;

            // フォームを親コメントの直後に挿入
            document.querySelector(`#comment-${commentId}`).after(form);

            // キャンセルボタンを表示
            cancelReplyButton.style.display = 'block';
        });
    });
}
