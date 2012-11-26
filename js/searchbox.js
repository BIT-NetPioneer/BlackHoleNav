$(document).ready(function() {
    $('.search-option-item').hover(function(){
        $(this).addClass('option_hover');
    }, function(){
        $(this).removeClass('option_hover');
    })
    $('.search-option-item').click(search_option_dd_set);
    $('.search-select').click(search_select_set);
});

function search_option_dd_set(){
    $('.search-option-item-select').removeClass('search-option-item-select');
    $('.d_list').removeClass('cur-option');
    
    $(this).addClass('search-option-item-select');
    switch($(this).attr('id')){
        case 'search-option-page':
            $('#search_selects-page').addClass('cur-option');
            change_search_cur("百度",'http://www.baidu.com/s','wd','select_baidu_page');
            break;
        case 'search-option-pic':
            $('#search_selects-pic').addClass('cur-option');
            change_search_cur("百度",'http://image.baidu.com/i','word','select_baidu_pic');
            break;
        case 'search-option-music':
            $('#search_selects-music').addClass('cur-option');
            change_search_cur("百度",'http://music.baidu.com/search','key','select_baidu_music');
            break;
        case 'search-option-video':
            $('#search_selects-video').addClass('cur-option');
            change_search_cur("百度",'http://video.baidu.com/v','word','select_baidu_video');
            break;
        case 'search-option-map':
            $('#search_selects-map').addClass('cur-option');
            change_search_cur("百度",'http://map.baidu.com/m','word','select_baidu_map');
            break;
        case 'search-option-ip':
            $('#search_selects-ip').addClass('cur-option');
            change_search_cur("校内IP",'http://star.bit.edu.cn/ipsearch/ip.php','ip','select_lan_ip');
            break;
    }
    $('.keywords').focus();
    $('.keywords').select();
}

function change_search_cur(name, url, inputid, selectid){
    $('.select_option_cur').html(name);
    $('#keyword').attr('name', inputid);
    $('#search-form').attr('action', url);
    
    $('.cur').removeClass('cur');
    $('.'+selectid).addClass('cur');
}

function search_select_set(){
    switch($(this).attr('id')){
        case 'select_google_page':
            change_search_cur('Google','http://www.google.com.hk/search','q','select_google_page');
            break;
        case 'select_baidu_page':
            change_search_cur("百度",'http://www.baidu.com/s','wd','select_baidu_page');
            break;
        case 'select_bing_page':
            change_search_cur('必应','http://cn.bing.com/search','q','select_bing_page');
            break;
        case 'select_lan_page':
            change_search_cur('校内','','','select_lan_page');
            break;
        case 'select_google_pic':
            change_search_cur('Google','https://images.google.com/search','q','select_google_pic');
            break;
        case 'select_baidu_pic':
            change_search_cur("百度",'http://image.baidu.com/i','word','select_baidu_pic');
            break;
        case 'select_bing_pic':
            change_search_cur('必应','http://cn.bing.com/images/search','q','select_bing_pic');
            break;
        case 'select_baidu_music':
            change_search_cur("百度",'http://music.baidu.com/search','key','select_baidu_music');
            break;
        case 'select_QQ_music':
            change_search_cur('QQ','http://y.qq.com/','p','select_QQ_music');
            break;
        case 'select_zhaoyue_music':
            change_search_cur('找乐','','','select_zhaoyue_music');
            break;
        case 'select_baidu_video':
            change_search_cur("百度",'http://video.baidu.com/v','word','select_baidu_video');
            break;
        case 'select_youku_video':
            change_search_cur('优酷','http://www.soku.com/search_video','q','select_youku_video');
            break;
        case 'select_tudou_video':
            change_search_cur('土豆','','','select_tudou_video');
            break;
        case 'select_google_map':
            change_search_cur('Google','https://maps.google.com/maps','q','select_google_map');
            break;
        case 'select_baidu_map':
            change_search_cur("百度",'http://map.baidu.com/m','word','select_baidu_map');
            break;
        case 'select_bing_map':
            change_search_cur('必应','http://cn.bing.com/maps/default.aspx','q','select_bing_map');
            break;
        case 'select_lan_ip':
            change_search_cur("校内IP",'http://star.bit.edu.cn/ipsearch/ip.php','ip','select_lan_ip');
            break;
        case 'select_ip138_ip':
            change_search_cur('ip138','http://www.ip138.com/ips138.asp','ip','select_ipcn_ip');
            break;
    }
    $('.d_list>dd').css('display','none');
    $('.keywords').focus();
    
}

