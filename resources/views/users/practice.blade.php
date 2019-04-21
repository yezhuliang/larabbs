<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'C-Web') - {{ setting('site_name', 'C语言开发练习网站') }}</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="http://cdn.bootcss.com/ace/1.2.4/ace.js"></script>
    <script src="http://cdn.bootcss.com/ace/1.2.4/ext-language_tools.js"></script>
    <script src="http://cdn.bootcss.com/ace/1.2.4/ext-old_ie.js"></script>
    <script src="http://cdn.bootcss.com/ace/1.2.4/theme-monokai.js"></script>
    <script src="/js/jquery-3.3.1.min.js"></script>

</head>
<body>
    <div id="app" class="{{ route_class() }}-page">

        @include('layouts._header')

        <div class="container">
            @include('layouts._message')

            <div style="float: left;border: 0.5px solid red;height: 600px;width: 530px; text-align: center;">
                练习教程
            </div>
            <div style="float: left;height: 600px;width: 580px; ">
                <pre id="code" class="ace_editor" style="min-height:505px; width: 580px;"><textarea class="ace_text-input">#include <stdio.h>
int main()
{
    /* 我的第一个 C 程序 */
    printf("Hello, World! \n");

    return 0;
}</textarea></pre>

                    <input type="button" value="运行" onclick="runCode()">
                <div style="border: 0.5px solid blue; height: 56px;width: 580px;">运行结果:</div>
            </div>
        </div>
        @include('layouts._footer')
    </div>

        @if (app()->isLocal())
            @include('sudosu::user-selector')
        @endif

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
            //初始化对象
            editor = ace.edit("code");

            //设置风格和语言
            theme = "clouds"
            language = "c_cpp"
            editor.setTheme("ace/theme/" + theme);
            editor.session.setMode("ace/mode/" + language);

            //字体大小
            editor.setFontSize(18);

            //设置只读（true时只读，用于展示代码）
            editor.setReadOnly(false);

            //自动换行,设置为off关闭
            editor.setOption("wrap", "free")

            //启用提示菜单
            ace.require("ace/ext/language_tools");
            editor.setOptions({
                    enableBasicAutocompletion: true,
                    enableSnippets: true,
                    enableLiveAutocompletion: true
                });

            function runCode()
            {
                var valu = editor.getValue();
                console.log(valu);
            }

        </script>
    @yield('scripts')
</body>
</html>