class VideoController
{
    constructor()
    {

        let videoplayer = $('#video_run')[0];
        
        this.Init();
        
        videoplayer.play();
        this.initVideoControll();
    }

    Init()
    {
    
        $( ".form-checkbox" ).prop( "checked", false );
        $('#reset').hide();
        $('#valide').hide();

    }




    initVideoControll()
    {
        
        let reset = $('#reset');
        $('#reset').hide();
        reset.on('click',function(e){
            e.preventDefault();
            $('#video_run')[0].load();
            getdata.resetQuestion();
            $('#video_run')[0].play();
        });
    }


}







