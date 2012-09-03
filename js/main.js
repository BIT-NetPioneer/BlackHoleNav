/**
 * 基于jQuery的导航相关操作
 * 
 * @package jQuery JavaScript Library v1.8.0
 * @author 风格独特 
 * @create 2012-08-31
 * @version 1.0
 */

// 文档加载完后执行所有操作
$(function() {
    SeachTab();
    SearchSuggestGoogle();
    SearchSuggestBaidu();
});

// 鼠标放在tab上切换相应导航
var g_searchTab;
var g_searchDiv;
function SeachTab () {
    // 赋值全局变量，减少DOM操作
    g_searchTab = $("#search_btn>li");
    g_searchDiv = $("#search_contents>div[id!='listbox']");
    
    // 遍历子元素，注册事件
    g_searchTab.each(function (n) {
        $(this).bind("click", function () {
            var index = g_searchTab.index($(this));
            var preIndex = g_searchTab.index($(".btn2", $("#search_btn")));
            var selectDiv = g_searchDiv.eq(index);
            var preSelectDiv = g_searchDiv.eq(preIndex);
            var selectInput = $("input[type='text']", selectDiv);
            
            g_searchTab.attr("class", "btn1");
            $(this).attr("class", "btn2");
            
            var inputVal = $("input[type='text']", preSelectDiv).val();
            selectInput.val(inputVal);
            g_searchDiv.css("display", "none");
            selectDiv.css("display", "block");
            selectInput.focus();
        })
    });
}

// 搜素建议部分
var g_listBox;
function SearchSuggestGoogle() {
    g_listBox = $("#listbox");
    
    $("body").bind("click", function() {
         g_listBox.css("display", "none");
    });
    
    $("#s_google").bind("keyup", function(event) {
        var myEvent = event || window.event;  
        var keyCode = myEvent.keyCode;
        
        var inputValue = $("#s_google").val();
        if(inputValue == "") {
            g_listBox.css("display", "none");
            return ;
        }
        // 需要请求的按键，数字、字母、退格、删除、空格、shift
        if (keyCode >=48 && keyCode <= 57 || keyCode >= 65 && keyCode <= 90 || keyCode == 8 || keyCode == 46 || keyCode == 32 || keyCode == 16) {
            $.ajax({
                type : "get",
                async: "false",
                url: "https://www.google.com.hk/complete/search?client=hp&hl=zh-CN&gs_id=e&xhr=t&q=" + encodeURIComponent(inputValue),
                dataType : "jsonp",
                success : function(json) {
                    // 成功的处理
                    var item = json[1];
                    var itemLen = item.length;
                    if(itemLen <=0 ) {
                        g_listBox.css("display", "none");
                        return;
                    }
                    g_listBox.html("");
                    for(i = 0; i < itemLen; ++i) {
                        g_listBox.append("<div>" + item[i][0] + "</div>");
                    }
                    $("div", g_listBox).each(function(n) {
                        // 绑定hover的方法
                        $(this).hover(
                            function() {
                                $(this).addClass("listlinkcheck");
                            },
                            function() {
                                $(this).removeClass("listlinkcheck");
                            }
                        )
                        // 绑定单击的操作
                        $(this).bind("click", function() {
                             window.open("https://www.google.com.hk/search?q=" + encodeURIComponent($(this).text()));
                        });
                    });
                    // 显示区块
                    g_listBox.css("display", "block");
                },
                error:function() {
                    // 失败的处理
                    // alert('fail');
                }
            });
        } else if(keyCode == 38 || keyCode == 40) {
            // 上下键的操作
            // 所有提示的节点
            var allItem = $("div", g_listBox);
            if(allItem.length <= 0) {
                return;
            }
            var preCheck = $("div[class='listlinkcheck']", g_listBox);
            var nextIndex = 0;
            
            if(keyCode == 40) {
                // 下键操作
                if(preCheck.length > 0) {
                    var preIndex = allItem.index(preCheck);
                    nextIndex = (preIndex >= allItem.length - 1) ? allItem.length - 1 : preIndex + 1;
                }
                allItem.removeClass("listlinkcheck");
                $(allItem[nextIndex]).addClass("listlinkcheck");
            } else {
                // 上键操作
                if(preCheck.length > 0) {
                    var preIndex = allItem.index(preCheck);
                    nextIndex = (preIndex > 0) ? preIndex - 1 : 0;
                    allItem.removeClass("listlinkcheck");
                    $(allItem[nextIndex]).addClass("listlinkcheck");
                }
            }
            var inputValue = $("div[class='listlinkcheck']", g_listBox).text();
            $("#s_google").val(inputValue);
        } else if(keyCode == 13){
            // 回车键操作、默认提交表单
        }
    });
}

function SearchSuggestBaidu() {
    $("#s_baidu").bind("keyup", function(event) {
        var myEvent = event || window.event;  
        var keyCode = myEvent.keyCode;
        
        var inputValue = $("#s_baidu").val();
        if(inputValue == "") {
            g_listBox.css("display", "none");
            return ;
        }
        // 需要请求的按键，数字、字母、退格、删除、空格、shift
        if (keyCode >=48 && keyCode <= 57 || keyCode >= 65 && keyCode <= 90 || keyCode == 8 || keyCode == 46 || keyCode == 32 || keyCode == 16) {
            $.ajax({
                type : "get",
                async: "false",
                url: "http://unionsug.baidu.com/su?p=3&wd=" + encodeURIComponent(inputValue),
                dataType : "jsonp",
                jsonp: "cb",
                jsonpCallback: "BaiduSuggestion",
                success : function(json) {
                    // 成功的处理
                    var item = json.s;
                    var itemLen = item.length;
                    if(itemLen <=0 ) {
                        g_listBox.css("display", "none");
                        return;
                    }
                    g_listBox.html("");
                    for(i = 0; i < itemLen; ++i) {
                        g_listBox.append("<div>" + item[i] + "</div>");
                    }
                    $("div", g_listBox).each(function(n) {
                        // 绑定hover的方法
                        $(this).hover(
                            function() {
                                $(this).addClass("listlinkcheck");
                            },
                            function() {
                                $(this).removeClass("listlinkcheck");
                            }
                        )
                        // 绑定单击的操作
                        $(this).bind("click", function() {
                             window.open("http://www.baidu.com/baidu?tn=baidu&word=" + encodeURIComponent($(this).text()));
                        });
                    });
                    // 显示区块
                    g_listBox.css("display", "block");
                },
                error:function() {
                    // 失败的处理
                    //alert('fail');
                }
            });
        } else if(keyCode == 38 || keyCode == 40) {
            // 上下键的操作
            // 所有提示的节点
            var allItem = $("div", g_listBox);
            if(allItem.length <= 0) {
                return;
            }
            var preCheck = $("div[class='listlinkcheck']", g_listBox);
            var nextIndex = 0;
            
            if(keyCode == 40) {
                // 下键操作
                if(preCheck.length > 0) {
                    var preIndex = allItem.index(preCheck);
                    nextIndex = (preIndex >= allItem.length - 1) ? allItem.length - 1 : preIndex + 1;
                }
                allItem.removeClass("listlinkcheck");
                $(allItem[nextIndex]).addClass("listlinkcheck");
            } else {
                // 上键操作
                if(preCheck.length > 0) {
                    var preIndex = allItem.index(preCheck);
                    nextIndex = (preIndex > 0) ? preIndex - 1 : 0;
                    allItem.removeClass("listlinkcheck");
                    $(allItem[nextIndex]).addClass("listlinkcheck");
                }
            }
            var inputValue = $("div[class='listlinkcheck']", g_listBox).text();
            $("#s_baidu").val(inputValue);
        } else if(keyCode == 13){
            // 回车键操作、默认提交表单
        }
    });
}
