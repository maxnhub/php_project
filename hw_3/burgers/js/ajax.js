function sendAjax() {
    let userId = $('#user_id').val();
    $.get('pdo.php', {id:userId, ajax: 1}, function(resp) {
        console.log(resp);
        $('#result').html(resp.id + ': ' + resp.name);
    });
}