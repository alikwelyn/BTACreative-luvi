jQuery(function($){
    $('#load-more').click(function(){
        $(this).text('carregando...');
        var data = {
            'action': 'loadmore',
            'query': true_posts,
            'page' : current_page
        };
        $.ajax({
            url:ajaxurl, // обработчик
            data:data, // данные
            type:'POST', // тип запроса
            success:function(data){
                if( data ) { 
                    $('#load-more').text('Загрузить ещё').before(data); // вставляем новые посты
                    current_page++; // увеличиваем номер страницы на единицу
                    if (current_page == max_pages) $("#load-more").remove(); // если последняя страница, удаляем кнопку
                } else {
                    $('#load-more').remove(); // если мы дошли до последней страницы постов, скроем кнопку
                }
            }
        });
    });
});