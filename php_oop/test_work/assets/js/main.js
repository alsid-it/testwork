/*
 Авторизация
 */

$('.login-btn').click(function(e){
    e.preventDefault();
    
    $(`input`).removeClass('error');
    
    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val();
    
    $.ajax({
       url: '../test_work/inc/signin.php', 
       type: 'POST',
       dataType: 'json',
       data: {
           login: login,
           password: password
       },
       success (data){
                  
           if(data.status){
               document.location.href = '../test_work/profile.php';               
           }else{
               if(data.type === 1){
                  data.fields.forEach(function(field) {
                    $(`input[name="${field}"]`).addClass('error');
                  });
               }
               $('.msg').removeClass('none').text(data.message);
           }
            
       }
    });
});

/*
 Регистрация
 */

$('.reg-btn').click(function(e){
    e.preventDefault();
    
    $(`input`).removeClass('error');
    
    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val(),
        password2 = $('input[name="password2"]').val(),
        email = $('input[name="email"]').val(),
        name = $('input[name="name"]').val();
    
    let formData = new FormData();
    formData.append('login', login);
    formData.append('password', password);
    formData.append('password2', password2);
    formData.append('email', email);
    formData.append('name', name);
    
    $.ajax({
        url: '../test_work/inc/signup.php', 
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data){   
                    
           if(data.status){
               document.location.href = '../test_work/index.php'; 
               alert(`Регистрация прошла успешно`);
           }else{

               if(data.type === 1){
                  data.fields.forEach(function (field) {
                    $(`input[name="${field}"]`).addClass('error');
                    $(`.${field}`).removeClass('none');
                  });
               }          
           
           }
            
       }
    });
});