
var settings ={
    url:window.location.href,
    // url:"{{ fDesktopURL($bn_content->content_id,$bn_content->category->cat_slug,$bn_content->subcategory->subcat_slug,$bn_content->content_type) }}",
    total: 0
};
function addURL(url){
    settings.url = url;
}
function add(n){
    settings.total = settings.total+n;
}
function convertNumber(n){
    if(n>=1000000000) return (n/1000000000).toFixed(1)+'G';
    if(n>=1000000) return (n/1000000).toFixed(1)+'M';
    if(n>=1000) return (n/1000).toFixed(1)+'K';
    return n;
}
function updateCounter(){
    if (settings.total > 0){
        $(".custom_share_count").html('<span class="custom_num">'+convertNumber(settings.total)+'</span><span class="share_word">SHARES</span>').fadeIn();
    }
}
function getCount(){
    var url=settings.url;
    /*$.getJSON('https://count.donreach.com/?url='+encodeURIComponent(settings.url)+'&callback=?',function(d){
     add(d.total);
     updateCounter();
     });*/
    /*$.getJSON("https://api.bufferapp.com/1/links/shares.json?callback=?&url="+encodeURIComponent(settings.url),function(data){
     add(data.shares);
     updateCounter();
     });*/
    /*$.getJSON('https://graph.facebook.com/?id='+encodeURIComponent(settings.url),function(response){
     //alert(response.share.share_count);
     add(d.total);
     updateCounter();
     });*/
    addthis.sharecounters.getShareCounts({service: 'facebook', countUrl: url}, function(response) {
        // alert(response[0].count);
        //console.log(response);
        add(response[0].count);
        updateCounter();
    });
}
