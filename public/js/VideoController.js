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
    
        $('input:checkbox').attr('unchecked', 'unchecked');
        

    }


    initVideoControll()
    {
        
        let reset = $('#reset');
        reset.on('click',function(e){
            e.preventDefault();
            $('#video_run')[0].load();
            $('#video_run')[0].play();
        });
    }


}







