    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/css/tether.min.css" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/css/perfect-scrollbar.min.css" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/app.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/lib/theme-switcher/theme-switcher.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js" type="text/javascript"></script>    
    <script src="<?= base_url(); ?>assets/lib/datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/lib/jquery-flot/jquery.flot.time.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/lib/countup/countUp.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript
      	App.init();
      	App.dashboard();
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
      	App.livePreview();
      });
      
    </script>

    <script type="text/javascript">
      
      $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.formElements();
      });
    
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        //initialize the javascript
        App.init();
        $('form').parsley();
      });
    </script>

    <script type="text/javascript">
      var base_url = "<?= base_url();?>";
      $(function(){

        $("body").on("click", ".todos-item", function (){
            var TodoId = $(this).val();
              $.ajax({
                url: base_url + 'todo/done' ,
                type: 'post',
                data: {id:TodoId},
                success: function () {
                    console.log('Todo Done Success');
                },
                error: function () {
                    console.log('Todo Done Error');
                }
              });
        });//TodoDone


        $("body").on("click", ".todo-delete", function (event){
            event.preventDefault();
            var TodoId = $(this).attr("id");
            $(this).parent(".todo-task")[0].remove();
              $.ajax({
                url:  base_url + 'todo/delete' ,
                type: 'post',
                data: {id:TodoId},
                success: function () {
                    console.log('Todo Delete Success');
                    
                },
                error: function () {
                    console.log('Todo Delete Error');
                }
              });
        });//TodoDelete


        $("body").on("click", ".todo-add" ,function (event){
            event.preventDefault();
          var todo = $(".todo-add-input").val()
          if(todo !=""){
          $.ajax({
            url:  base_url + 'todo/add' ,
            type: 'post',
            data: {todo:todo},
            success: function () {
                $(".todo-tasks").load(" .todo-tasks");
                $(".todo-add-input").val("");
            },
            error: function () {
                console.log('Todo Add Error');
            }
          });
        } else{
          alert("Todo cannot be empty!");
        }

        });//todo add
        
        

      })
    </script>




  </body>
</html>