let addComBtn = document.getElementById('addComBtn'),
    postComBtn = document.getElementById('postComBtn'),
    commBlock = document.querySelector('.comment-block'),
    comArea = document.getElementById('comArea');
    
if(addComBtn!=null)addComBtn.addEventListener('click',showCommentBlock);
if(postComBtn!=null)postComBtn.addEventListener('click',addComment);

function addComment(e){
    e.preventDefault();
}

function showCommentBlock(e){
    commBlock.className = 'd-block w-100';
    e.preventDefault();
}
    
let comments = {
    ajax:async function(opt){
        var data = new FormData();
        for(var key in opt.data){
            data.append(key,opt.data[key]);
        }
        // POST
        var xhr = new XMLHttpRequest();
        xhr.open("post","/components/ajax-comments.php",true);
        // As it respons
        xhr.onload = function(){
            if(typeof(opt.load)=="function"){
                opt.load(this.response);
            }
        }
        // sending the data
        xhr.send(data);
    },
    load: function(){
        let userId = document.getElementById("userId");
        userId = userId==null?"":userId.value;
        this.ajax({
            data:{
                "req":"show",
                "clink":document.getElementById("clink").value,
                "userId": userId
            },
            load:function(res){
                document.getElementById("comments").innerHTML=res;
            }
        });
    },
    add: function(el){
        var data = {
            req:"add",
            clink:document.getElementById('clink').value,
            user_id: document.getElementById('userId').value,
            text: comArea.value
        };
        if(comArea.value!=""){
            comments.ajax({
                data:data,
                load:function(res){
                    console.log(res);
                    //add and refresh the database
                    if(res=="OK"){
                        comments.load();
                    }else{
                        console.log(res);
                        alert("ERROR!");
                    }
                }
            });
            comArea.value = "";
            commBlock.className = 'd-none';
        }
    },
    delete: function(cid){
        if(confirm("Do you want to delete it?")){            
            comments.ajax({
                data: {
                    req:"del",
                    id: cid.toString()
                },
                load: function(res){
                    if(res=="OK"){
                        comments.load();
                    }else{ 
                        console.log(res);
                        alert("ERROR");
                    }
                }
            });
        }
    },
    beforeEdit:function(e){
        if(e.id == 'edit'){
            let text = e.parentElement.parentElement.children[3].textContent;
            let textArea = document.createElement('textArea');
            e.parentElement.parentElement.children[3].remove();
            textArea.appendChild(document.createTextNode(text));
            let button = e.parentElement.parentElement.children[3];
            e.parentElement.parentElement.insertBefore(textArea,button);
            e.textContent="OK";
            e.id = 'editOk';            
        }else{
            let text = e.parentElement.parentElement.children[3].value,
                oldText = e.parentElement.parentElement.children[3].textContent;
            cid = e.parentElement.parentElement.children[0].value;
            if(text == oldText) text = '';
            comments.edit(cid,text);
        }
    },
    edit: function(cid,text){
        comments.ajax({
            data: {
                req: "edit",
                id: cid,
                text: text
            },
            load: function(res){
                if(res=="OK"){
                    console.log(res);
                    comments.load();
                }else{
                    console.log(res);
                    alert("ERROR");
                }
            }
        })
    }
}
window.addEventListener("load",function(){
   comments.load(); 
});

let things = {
    ajax:function(opt){
            var data = new FormData();
            for(var key in opt.data){
                data.append(key,opt.data[key]);
            }
            // POST
            var xhr = new XMLHttpRequest();
            xhr.open("post","/components/ajax-comments.php",true);
            // As it respons
            xhr.onload = function(){
                if(typeof(opt.load)=="function"){
                    opt.load(this.response);
                }
            }
            // sending the data
            xhr.send(data);
    },
    load: function(thing){
        this.ajax({
            data:{
                req:"adminShow",
                thing: thing
            },
            load:function(res){
                things.clear();
                if(thing!='news') thing+='s';
                document.getElementById(thing).innerHTML = res;
            }
        });
    },
    clear: function(){
        let things = Array.from(document.querySelectorAll('.admin'));
        things.forEach((e,index)=>{
            e.innerHTML='';
        });
    },
    delete: function(e){
        let self = this;
        if(confirm("Are you sure about it? Did you think fully? Woow maan!")){
        this.ajax({
            data:{
                req:"adminDel",
                thing: e.id,
                id: e.value
            },
            load:function(res){
                if(res=="ok"){
                    console.log(res);
                    self.load(e.id);
                }else{
                    console.log(res);
                }
            }
        })        
            
        }
    },
    add: function(e){
        let addId = e.children[0].children[0].children[3].id;
        if(addId == 'add'){
            let el = document.createElement('div'),
                title = document.createElement('input'),
                text = document.createElement('textarea'),
                qCategory = document.createElement('select'),
                newsCategory  =document.createElement('select'),
                level = document.createElement('select'),
                qAnswer = document.createElement('textarea'),
                qType = document.createElement('select'),
                videoLink = document.createElement('input'),
                order = document.createElement('input');
            order.setAttribute('type','number');
            title.className = text.className = qCategory.className = qAnswer.className = level.className = newsCategory.className = videoLink.className = order.className = 'd-block';
            el.className = 'container admin-add';
            level.innerHTML = '<option value="1">Noob</option><option value="2">Beginner</option><option value="3">Junior</option><option value="4">Middle</option><option value="5">Professional</option>';            
            if(e.id == 'news'){
                title.setAttribute('placeholder','News Title');
                title.id = 'news-title';
                text.setAttribute('placeholder','News Content');
                text.id = 'news-text';
                el.append(title);
                newsCategory.innerHTML='<option value="1">Lesson</option><option value="2">Game</option><option value="3">Other</option>'
                newsCategory.id = 'news-category';
                el.append(newsCategory);
                el.append(text);
            }else if(e.id == 'questions'){
                title.setAttribute('placeholder','Question Title');
                title.id = 'question-title';
                text.setAttribute('placeholder','Question Text');
                text.id = 'question-text';
                qAnswer.setAttribute('placeholder','Question Answer');
                qAnswer.id = 'question-answer';
                qCategory.innerHTML= '<option value="1">Lesson</option><option value="2">Game</option>';
                qCategory.id = 'question-category';
                qType.innerHTML = '<option value="1">Test</option><option value="2">Task</option>';
                qType.id = 'question-type';
                level.id = 'question-level';
                el.append(title);
                el.append(text);
                el.append(qAnswer);
                el.append(qCategory);
                el.append(qType);
                el.append(level);
            }else if(e.id == 'lessons' || e.id == 'games'){
                title.setAttribute('placeholder','Title');
                title.id = 'gL-title';
                text.setAttribute('placeholder','Text');
                text.id = 'gL-text';
                videoLink.setAttribute('placeholder','Video Link');
                videoLink.id = 'gL-link';
                order.setAttribute('placeholder','Order');
                order.id = 'gL-order';
                level.id = 'gL-level';
                el.append(title);
                el.append(text);
                el.append(videoLink);            
                el.append(order);
                el.append(level);
            }

            e.append(el);
            console.log(addId);
            e.children[0].children[0].children[3].id = 'addOk';
            e.children[0].children[0].children[3].innerHTML = 'OK';
            let thing = e.parentElement.getAttribute('value');

        }else{
            let thing = e.parentElement.getAttribute('value');
            let data = {req:'adminAdd'};
            if(thing == 'news'){
                 data.thing = thing;
                 data.title = document.getElementById('news-title').value;
                 data.content = document.getElementById('news-text').value;
                 data.short_content = data.content.slice(0,30);
                 data.category = document.getElementById('news-category').value;
            }else if(thing == 'lesson'||thing == 'game'){
                 data.thing = thing;
                 data.title = document.getElementById('gL-title').value;
                 data.text = document.getElementById('gL-text').value;
                 data.link = document.getElementById('gL-link').value;
                 data.order = document.getElementById('gL-order').value;
                 data.level = document.getElementById('gL-level').value;
            }else if(thing == 'question'){
                 data.id = document.getElementById('question').value;
                 data.thing = thing;
                 data.title = document.getElementById('question-title').value;
                 data.text = document.getElementById('question-text').value;
                 data.answer = document.getElementById('question-answer').value;
                 data.category = document.getElementById('question-category').value;
                data.type = document.getElementById('question-type').value;                
                data.level = document.getElementById('question-level').value;
            }
            things.ajax({
                data:data,
                load: function(res){
                    console.log(res);
                    let thing;
                    if(e.id!='news')thing = e.id.slice(0,e.id.length-1);
                    else thing=e.id;
                    things.load(thing);
                }
            });
        }
    },
    edit: function(e){
        let data = {req:'adminEditGet'},
            editId;
        if(e.id =='question'||e.id =='lesson'||e.id =='game'){
            editId = e.parentElement.children[2].id;
            data.thing = e.id;
            data.id = e.value;            
        }else{
            editId = e[1].parentElement.children[2].id;
            data.thing = e[1].id;
            data.id = e[1].value;    
        }
        console.log(editId);
        
        if(editId == 'edit'){  
            document.getElementById('edit').id = 'editOk';
            document.getElementById('editOk').innerHTML = 'OK';
        
//---------------------------------
            let el = document.createElement('div'),
                title = document.createElement('input'),
                text = document.createElement('textarea'),
                qCategory = document.createElement('select'),
                newsCategory  =document.createElement('select'),
                level = document.createElement('select'),
                qAnswer = document.createElement('textarea'),
                qType = document.createElement('select'),
                videoLink = document.createElement('input'),
                order = document.createElement('input');
            let flag = 0;
            
            order.setAttribute('type','number');
            title.className = text.className = qCategory.className = qAnswer.className = level.className = newsCategory.className = videoLink.className = order.className = 'd-block';
            el.className = 'container admin-edit';
            level.innerHTML = '<option value="1">Noob</option><option value="2">Beginner</option><option value="3">Junior</option><option value="4">Middle</option><option value="5">Professional</option>'; 
            //flag == 0 
            if(e.id == 'question'){
                title.id = 'question-title';
                text.id = 'question-text';
                qAnswer.id = 'question-answer';
                qCategory.innerHTML= '<option value="1">Lesson</option><option value="2">Game</option>';
                qCategory.id = 'question-category';
                qType.innerHTML = '<option value="1">Test</option><option value="2">Task</option>';
                qType.id = 'question-type';
                level.id = 'question-level';
                el.append(title);
                el.append(text);
                el.append(qAnswer);
                el.append(qCategory);
                el.append(qType);
                el.append(level);
            }else if(e.id == 'lesson' || e.id == 'game'){//flag == 1
                title.id = 'gL-title';
                text.id = 'gL-text';
                videoLink.id = 'gL-link';
                order.id = 'gL-order';
                level.id = 'gL-level';
                el.append(title);
                el.append(text);
                el.append(videoLink);            
                el.append(order);
                el.append(level);
                flag = 1;
            }else if(e[1].id=='news'){ //flag == 2;
                title.id = 'news-title';
                text.id = 'news-text';
                el.append(title);
                newsCategory.innerHTML='<option value="1">Lesson</option><option value="2">Game</option><option value="3">Other</option>'
                newsCategory.id = 'news-category';
                el.append(newsCategory);
                el.append(text);
                flag = 2;
            }
            if(flag==2) {
                this.ajax({
                    data: data,
                    load: function(res){
                        let response = JSON.parse(res);
                        title.value = response[0]['title'];
                        text.value = response[0]['content'];
                        newsCategory.value = response[0]['category_id'];
                    }
                });                
                console.log(e[0]);
                e[0].append(el);
            }
            else if(flag){
                this.ajax({
                    data: data,
                    load: function(res){
                        let response = JSON.parse(res);
                        console.log(response);
                        title.value = response[0]['title'];
                        text.value = response[0]['text'];
                        videoLink.value = response[0]['video_link'];
                        level.value = parseInt(response[0]['user_level_id']);
                        order.value = parseInt(response[0]['order']);
                    }
                });                
                e.parentElement.parentElement.parentElement.append(el);
            }else {
                this.ajax({
                    data: data,
                    load: function(res){
                        let response = JSON.parse(res);
//                        console.log(response);
                        title.value = response[0]['title'];
                        text.value = response[0]['text'];
                        qAnswer.value = response[0]['answer'];
                        qCategory.value = response[0]['question_category'];
                        qType.value = response[0]['question_type'];
                        level.value = response[0]['user_level'];
                    }
                });                
                e.parentElement.parentElement.parentElement.append(el);
                
            }
            
//---------------------------------
                    
            
        }else {
            console.log(data.thing);
            data.req = 'adminEdit';
            if(data.thing == 'news'){
                data.title = document.getElementById('news-title').value;
                data.text = document.getElementById('news-text').value;
                data.short_text = data.text.slice(0,30)+'...';
                data.category = document.getElementById('news-category').value;
            }else if(data.thing == 'lesson'||data.thing == 'game'){
                data.title = document.getElementById('gL-title').value;
                data.text = document.getElementById('gL-text').value;
                data.videoLink= document.getElementById('gL-link').value;
                data.order= document.getElementById('gL-order').value;
                data.level= document.getElementById('gL-level').value;
            }else if(data.thing == 'question'){
                data.title = document.getElementById('question-title').value;
                data.text = document.getElementById('question-text').value;
                data.category= document.getElementById('question-category').value;
                data.type= document.getElementById('question-type').value;
                data.level= document.getElementById('question-level').value;
                data.answer= document.getElementById('question-answer').value;
            }
            things.ajax({
                data: data,
                load: function(res){
                    console.log(res);
                    things.load(data.thing);
                }
            });
           console.log('after clicking on the edit button');
        }
    }
    
}