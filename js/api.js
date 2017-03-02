$(document).ready(function() {
    var ytkey = 'AIzaSyBWwR6rxZg2S83XDEm_cXyEqB4Fr1lnZAU';
    $("#pageTokenNext").on( "click", function( event ) {
        $("#pageToken").val($("#pageTokenNext").val());
        youtubeApiCall();
    });
    $("#pageTokenPrev").on( "click", function( event ) {
        $("#pageToken").val($("#pageTokenPrev").val());
        youtubeApiCall();
    });
    $("#geekdoos-searchBtn").on( "click", function( event ) {
        youtubeApiCall();
        return false;
    });

    function getVideoDetails(ids){
        $.ajax({
            cache: false,
            data: $.extend({
                key: ytkey,
                part: 'snippet,contentDetails,statistics'
            }, {id: ids}),
            dataType: 'json',
            type: 'GET',
            timeout: 5000,
            fields: "items(id,contentDetails,statistics,snippet(publishedAt,channelTitle,channelId,title,description,thumbnails(medium)))",
            url: 'https://www.googleapis.com/youtube/v3/videos'
        })
            .done(function(data) {
                var items = data.items, videoList = "";
                $.each(items, function(index,e) {
                    videoList = videoList + '<li class="geekdoos-video-list-item"><div class="geekdoos-content-wrapper"><a href="https://www.youtube.com/watch?v='+e.id+'" target="_blank" class="geekdoos-content-link" title="'+e.snippet.title+'"><span class="title">'+e.snippet.title+'</span><span class="stat attribution">by <span>'+e.snippet.channelTitle+'</span></span></a></div><div class="geekdoos-thumb-wrapper"><a href="" class="geekdoos-thumb-link"><span class="geekdoos-simple-thumb-wrap"><img alt="'+e.snippet.title+'" src="'+e.snippet.thumbnails.default.url+'" width="120" height="90"></span></a><span class="video-time">'+YTDurationToSeconds(e.contentDetails.duration)+'</span></div></li>';
                });
                $("#geekdoos-watch-related").html(videoList);
            });
    }

    function YTDurationToSeconds(duration) {
        var match = duration.match(/PT(\d+H)?(\d+M)?(\d+S)?/)
        var hours = ((parseInt(match[1]) || 0) !== 0)?parseInt(match[1])+":":"";
        var minutes = ((parseInt(match[2]) || 0) !== 0)?parseInt(match[2])+":":"";
        var seconds = ((parseInt(match[3]) || 0) !== 0)?parseInt(match[3]):"00";
        var total = hours + minutes + seconds;
        return total;
    }

    function youtubeApiCall(){
        $.ajax({
            cache: false,
            data: $.extend({
                key: ytkey,
                q: $('#geekdoos-search').val(),
                part: 'snippet'
            }, {maxResults:20,pageToken:$("#pageToken").val()}),
            dataType: 'json',
            type: 'GET',
            timeout: 5000,
            fields: "pageInfo,items(id(videoId)),nextPageToken,prevPageToken",
            url: 'https://www.googleapis.com/youtube/v3/search'
        })
            .done(function(data) {
                $('.btn-group').show();
                if (typeof data.prevPageToken === "undefined") {$("#pageTokenPrev").hide();}else{$("#pageTokenPrev").show();}
                if (typeof data.nextPageToken === "undefined") {$("#pageTokenNext").hide();}else{$("#pageTokenNext").show();}
                var items = data.items, videoids = [];
                $("#pageTokenNext").val(data.nextPageToken);
                $("#pageTokenPrev").val(data.prevPageToken);
                $.each(items, function(index,e) {
                    videoids.push(e.id.videoId);
                });
                getVideoDetails(videoids.join());
            });
    }
});