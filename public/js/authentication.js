$(document).ready(function() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    $(".logout").on("click",() => {
        requestHandler('post','/logout', csrfToken);
    })  
    
    function requestHandler(method, url, token, data = null){
        $.ajax({
            type: method,
            url: url,
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': token
            },
            success: (response) => {
                if(response.redirect){
                    window.location.href = response.redirect;
                }
            },
            error: (response) => {
                console.log(response)
            },
        });
    }
});