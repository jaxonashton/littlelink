          <p>Allows editing the frontend of your site. Amongst other things, this file allows customization of:<br> 
Home Page, links, titles, Google Analytics and meta tags.</p>
        <form action="{{ route('editAC') }}" method="post">
          @csrf
          <div class="form-group">
            <label>Advanced Configuration file.</label>
            <textarea style="width:100%;display:none;" class="form-control" name="AdvancedConfig" rows="280">{{ file_get_contents('config/advanced-config.php') }}</textarea>
            <div id="editor" style="width:100%; height:<?php echo count(file('config/advanced-config.php')) * 24 + 15;?>px;" class="form-control" name="AdvancedConfig" rows="280">{{ file_get_contents('config/advanced-config.php') }}</div>
          </div>
          <button type="submit" class="mt-3 ml-3 btn btn-info">Save</button>
          <a class="mt-3 ml-3 btn btn-primary confirmation" href="{{url('/panel/advanced-config?restore-defaults')}}">Restore defaults</a>
          <script type="text/javascript">
              var elems = document.getElementsByClassName('confirmation');
              var confirmIt = function (e) {
                  if (!confirm('Are you sure?')) e.preventDefault();
              };
              for (var i = 0, l = elems.length; i < l; i++) {
                  elems[i].addEventListener('click', confirmIt, false);
              }
          </script>
        </form>


<script src="{{ asset('studio/external-dependencies/ace.js') }}" type="text/javascript" charset="utf-8"></script>
<script>
var editor = ace.edit("editor");
editor.setTheme("ace/theme/xcode");
editor.getSession().setMode("ace/mode/javascript");
editor.session.setUseWorker(false);
</script>
<script>
editor.getSession().on('change', function(e) {
$('textarea[name=AdvancedConfig]').val(editor.getSession().getValue());
});
</script>
