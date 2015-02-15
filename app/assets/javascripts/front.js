(function($){
    var Gtskk = {

        init: function(){
            var self = this;
            $(document).pjax('a:not(a[target="_blank"])', 'body');
            $(document).on('pjax:send', function() {
                NProgress.start();
            });
            $(document).on('pjax:end', function() {
                NProgress.done();
                self.siteBootUp();
            });
            self.siteBootUp();
            self.initLightBox();
            self.initNotificationsCount();
        },

        /*
        * Things to be execute when normal page load
        * and pjax page load.
        */
        siteBootUp: function(){
            var self = this;
            self.initExternalLink();
            self.initTimeAgo();
            self.initScrollToTop();
            self.initTextareaAutoResize();
            self.initHeightLight();
            self.initLocalStorage();
            self.initEditorPreview();
            self.initReplyOnPressKey();
            self.initDeleteForm();
            self.initInlineAttach();
            // self.snowing();
            self.search();
            if(Config.user_id !== 0)
                self.avatarUpload();
        },

        /**
         * Open External Links In New Window
         */
        initExternalLink: function(){
            $('a[href^="http://"], a[href^="https://"]').each(function() {
               var a = new RegExp('/' + window.location.host + '/');
               if(!a.test(this.href) ) {
                   $(this).click(function(event) {
                       event.preventDefault();
                       event.stopPropagation();
                       window.open(this.href, '_blank');
                   });
               }
            });
        },

        /**
         * Automatically transform any Date format to human
         * friendly format, all you need to do is add a
         * `.timeago` class.
         */
        initTimeAgo: function(){
            moment.lang('zh-cn');
            $('.timeago').each(function(){
                var time_str = $(this).text();
                if(moment(time_str, "YYYY-MM-DD HH:mm:ss", true).isValid()) {
                    $(this).text(moment(time_str).fromNow());
                }
            });
        },

        /**
         * Autoresizing the textarea when you typing.
         */
        initTextareaAutoResize: function(){
            $('textarea').autosize();
        },

        /**
         * Scroll to top in one click.
         */
        initScrollToTop: function(){
            $.scrollUp.init({
                animation: 'fade',
                scrollImg: true
            });
        },

        /**
         * Code highlight.
         */
        initHeightLight: function(){
            Prism.highlightAll();
        },

        /**
         * lightbox
         */
        initLightBox: function(){
            $(document).delegate('.content-body img:not(.emoji)', 'click', function(event) {
                event.preventDefault();
                return $(this).ekkoLightbox();
            });
        },

        /**
         * do content preview
         */
        runPreview: function() {
            var replyContent = $("#reply_content");
            var oldContent = replyContent.val();

            if (oldContent) {
                marked(oldContent, function (err, content) {
                  $('#preview-box').html(content);
                  emojify.run(document.getElementById('preview-box'));
                });
            }
        },

        /**
         * Init post content preview
         */
        initEditorPreview: function() {
            var self = this;
            $("#reply_content").focus(function(event) {
                $("#reply_notice").fadeIn(1500);
                $("#preview-box").fadeIn(1500);
                $("#preview-lable").fadeIn(1500);

                if (!$("#reply_content").val()) {
                    $("html, body").animate({ scrollTop: $(document).height()}, 1800);
                }
            });
            $('#reply_content').keyup(function(){
                self.runPreview();
            });
        },

        /**
         * 通知用户未读消息
         */
        initNotificationsCount: function() {
            var original_title = document.title;
            if(Config.user_id > 0)
            {
                function scheduleGetNotification()
                {
                    $.post(Config.routes.notificationsCount, function(data){
                        var nCount = parseInt(data);
                        if(nCount > 0)
                        {
                            $('#notification-count').text(nCount);
                            $('#notification-count').hasClass('badge-important') || $('#notification-count').addClass('badge-important');
                            document.title = '('+nCount+')'+original_title;
                        }
                        else
                        {
                            document.title =  original_title;
                            $('#notification-count').text(0);
                            $('#notification-count').addClass('badge-fade');
                            $('#notification-count').removeClass('badge-important');
                        }
                        setTimeout(scheduleGetNotification, 15000);
                    });
                }
                setTimeout(scheduleGetNotification, 15000);
            }
        },

        /*
         * Use Ctrl + Enter for reply
         */
        initReplyOnPressKey: function() {
            $(document).on("keydown", "#reply_content", function(e)
            {
                if ((e.keyCode == 10 || e.keyCode == 13) && e.ctrlKey) {
                    $(this).parents("form").submit();
                    return false;
                }
            });
        },

        /*
         * Construct a form when using the following code, makes more clean code.
         *   {{ link_to_route('tasks.destroy', 'D', $task->id, ['data-method'=>'delete']) }}
         * See this answer: http://stackoverflow.com/a/23082278/689832
         */
        initDeleteForm: function() {
            $('[data-method]')
                .attr('style','cursor:pointer;')
                .click(function() {
                    if(Config.user_id !== 0)
                    {
                        var current = $(this),
                            $li = current.closest('li'),
                            $method = current.attr('data-method'),
                            flag = true;
                        if($method == 'delete'){
                            flag = false;
                            if(confirm('确定要删除？'))
                                flag = true;
                        }
                        if (flag) {
                            $.post(current.attr('data-url'), {
                                    _method: $method,
                                    _token: Config.token
                                }, function(res){
                                    if(res.status === 'success'){
                                        if(current.attr('id') === 'topic-delete-button')
                                        {
                                            location.href = Config.routes.topic_url;
                                        }
                                        if($method === 'delete'){
                                            //发送请求前改变背景色
                                            $li.css("backgroundColor", "#FB6C6C");
                                            //删除成功
                                            $li.slideUp(300, function() {
                                                $('.replies .total b').text(res.message);
                                                //移除父级div
                                                $li.remove();
                                            });
                                        }
                                        else if(current.attr('id') === 'user-edit-button' || current.hasClass('pinSink'))
                                        // 用户禁用状态编辑或者文章置顶
                                        {
                                            location.reload();
                                        } 
                                        else
                                        {
                                            if(current.hasClass('vote')){
                                                current.toggleClass('active');
                                                var sib = current.siblings()[0];
                                                if($(sib).hasClass('active'))
                                                    $(sib).removeClass('active');
                                                $('#up-vote').find('span').text(res.message);
                                            }else{
                                                current.find('span').text(res.message);
                                            }

                                        }
                                    }else{
                                        alert(res.message);
                                    }
                                }, 'json');
                        }
                    }
                    else
                    {
                        location.href = Config.routes.login_url;
                    }
                    
                });
        },

        /**
         * Local Storage
         */
        initLocalStorage: function() {
            var self = this;
            $("#reply_content").focus(function(event) {

                // Topic Title ON Topic Creation View
                localforage.getItem('topic-title', function(err, value) {
                    if ($('.topic_create #topic-title').val() == '' && !err) {
                        $('.topic_create #topic-title').val(value);
                    };
                });
                $('.topic_create #topic-title').keyup(function(){
                    localforage.setItem('topic-title', $(this).val());
                });

                // Topic Content ON Topic Creation View
                localforage.getItem('topic_create_content', function(err, value) {
                    if ($('.topic_create #reply_content').val() == '' && !err) {
                        $('.topic_create #reply_content').val(value);
                        self.runPreview();
                    }
                });
                $('.topic_create #reply_content').keyup(function(){
                    localforage.setItem('topic_create_content', $(this).val());
                });

                // Reply Content ON Topic Detail View
                localforage.getItem('reply_content', function(err, value) {
                    if ($('.topics-show #reply_content').val() == '' && !err) {
                        $('.topics-show #reply_content').val(value);
                        self.runPreview();
                    }
                });
                $('.topics-show #reply_content').keyup(function(){
                    localforage.setItem('reply_content', $(this).val());
                });
            })

            // Clear Local Storage on submit
            $("#topic-create-form").submit(function(event){
                localforage.removeItem('topic_create_content');
                localforage.removeItem('topic-title');
            });
            $("#reply-form").submit(function(event){
                localforage.removeItem('reply_content');
            });
        },

        /**
         * Upload image
         */
        initInlineAttach: function() {
            var self = this;
            $('#reply_content').inlineattach({
                uploadUrl: Config.routes.upload_image,
                extraParams: {
                  '_token': Config.token,
                  '_folder': 'images'
                },
                onUploadedFile: function(response) {
                    setTimeout(self.runPreview, 200);
                },
            });
        },


        /**
         * Showing weather（根据当地天气自动变化）
         */
        snowing: function() {
            var self = this;

            // only show snow in Christmas
            var today = new Date();
            var christmas = new Date(today.getFullYear(), 11, 25); // Month is 0-11 in JavaScript

            // 获取南京天气
            $.getJSON(location.protocol+'//'+location.hostname+'/api/weather', function(dat){
                if (dat)
                {
                    var $image = '';
                    var $speed = 5;
                    var $bgImg = '';
                    if(dat.indexOf('雪') !== -1)
                    {
                        $image = 'flake.png';
                        $bgImg = 'bgSnow.jpg';
                    }
                    else if(dat.indexOf('雨') !== -1)
                    {
                        $bgImg = 'bgRain.jpg';
                    }
                    else if(dat.indexOf('阴') !== -1)
                    {
                        $bgImg = 'bgYintian.jpg';
                    }
                    if($image)
                    {
                        $(document).snowfall({
                            image: 'assets/img/weather/'+$image,
                            flakeCount: 100,
                            minSize: 5,
                            maxSize:20,
                            minSpeed: $speed
                        });
                    }
                    // 改变背景图片
                    if($bgImg)
                    {
                        $('body').css('background', '#ccc url(../assets/img/weather/'+$bgImg+') no-repeat');
                        $('body').css('background-size', '100% 100%');
                    }
                }
            });

        },

        search: function() {
            //focusblurmenu
            jQuery.focusblurmenu = function(focusdom,focuswidthnew,animatetime) 
            {
                var focusblurmenuid = $(focusdom);
                var defval = focusblurmenuid.val();
                var defwidth = focusblurmenuid.width();
                focusblurmenuid.focus(function(){
                    var thisval = $(this).val();
                    if(thisval==defval){
                        $(this).val("");
                        $(this).animate({width:"+"+focuswidthnew}, animatetime).addClass("searchkeyfocus");
                    }
                });
                focusblurmenuid.blur(function(){
                    var thisval = $(this).val();
                    if(thisval==""){
                        $(this).val(defval);
                    }
                    $(this).animate({width:"+"+defwidth}, animatetime).removeClass("searchkeyfocus");
                });
                
            };
            $.focusblurmenu("#searchkey","280px","300");

        },
        avatarUpload: function(){
            // 头像下面指示字的显示隐藏
            $('.avatar a').mouseover(function(){
                $(this).find('span').toggleClass('hide');
            }).mouseout(function(){
                $(this).find('span').toggleClass('hide');
            });
            Dropzone.autoDiscover = false;
            var up = document.getElementById('avatarUpload');
            if(!up || up.dropzone) return;
            $('#avatarUpload').dropzone({
                paramName: "file",
                maxFilesize: 1,
                maxFiles: 1,
                maxfilesexceeded: function(file){
                    alert('最多只能传一张图片.');
                },
                uploadMultiple: false,
                clickable: '#avatar-src',
                init: function(){
                    this.on('success', function(file, res){
                        $('#avatar-src').attr('src', res.filename);
                    });
                    this.removeAllFiles();
                }
            });
        }

    }
    window.Gtskk = Gtskk;
})(jQuery);

$(document).ready(function()
{
    Gtskk.init();
});

// reply a reply
function replyOne(username){
    replyContent = $("#reply_content");
    if(replyContent.length)
    {
        oldContent = replyContent.val();
        prefix = "@" + username + " ";
        newContent = ''
        if(oldContent.length > 0){
            if (oldContent != prefix) {
                newContent = oldContent + "\n" + prefix;
            }
        } else {
            newContent = prefix
        }
        replyContent.focus();
        replyContent.val(newContent);
        moveEnd($("#reply_content"));
    }
	else
    {
        location.href = Config.routes.login_url;
    }
}

var moveEnd = function(obj){
	obj.focus();

	var len = obj.value === undefined ? 0 : obj.value.length;

	if (document.selection) {
		var sel = obj.createTextRange();
		sel.moveStart('character',len);
		sel.collapse();
		sel.select();
	} else if (typeof obj.selectionStart == 'number' && typeof obj.selectionEnd == 'number') {
		obj.selectionStart = obj.selectionEnd = len;
	}
}