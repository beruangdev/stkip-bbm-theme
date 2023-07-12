window.onload = () => {
  (function () {
    console.log("window load");
    var widget_code = "";
    var url_structure = "none";
    var default_language = "id";
    function fire_event(element, event) {
      console.log("fire_event", element, event);
      try {
        if (document.createEventObject) {
          var evt = document.createEventObject();
          element.fireEvent("on" + event, evt);
        } else {
          var evt = document.createEvent("HTMLEvents");
          evt.initEvent(event, true, true);
          element.dispatchEvent(evt);
        }
      } catch (e) {}
    }
    function load_tlib() {
      console.log("load_tlib");
      if (!window.gt_translate_script) {
        window.gt_translate_script = document.createElement("script");
        gt_translate_script.src =
          "https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2";
        document.body.appendChild(gt_translate_script);
      }
    }

    if (url_structure == "none") {
      widget_code += '<div id="google_translate_element2"></div>';
    }

    var add_code = document.createElement("div");
    add_code.innerHTML = widget_code;
    document.body.appendChild(add_code);

    if (url_structure == "none") {
      window.doGTranslate = function (lang_pair) {
        console.log("doGTranslate", lang_pair);
        if (lang_pair.value) lang_pair = lang_pair.value;
        if (lang_pair == "") return;
        var lang = lang_pair.split("|")[1];
        if (lang == lang_pair.split("|")[0]) return;
        var teCombo;
        var sel = document.getElementsByTagName("select");
        for (var i = 0; i < sel.length; i++)
          if (sel[i].className.indexOf("goog-te-combo") != -1) {
            teCombo = sel[i];
            break;
          }
        if (
          document.getElementById("google_translate_element2") == null ||
          document.getElementById("google_translate_element2").innerHTML
            .length == 0 ||
          teCombo.length == 0 ||
          teCombo.innerHTML.length == 0
        ) {
          setTimeout(() => {
            doGTranslate(lang_pair);
          }, 500);
        } else {
          teCombo.value = lang;
          fire_event(teCombo, "change");
        }
      };
      window.googleTranslateElementInit2 = function () {
        console.log("googleTranslateElementInit2");
        new google.translate.TranslateElement(
          { pageLanguage: default_language, autoDisplay: false },
          "google_translate_element2"
        );
      };
    }
    load_tlib();
    window.gt_translate_script.onload = function () {
      let lang = localStorage.getItem("fat:language") || "id";
      doGTranslate(default_language + "|" + lang);
    };
  })();

  let selectEl = document.querySelector(`select[id="language"]`);
  selectEl.addEventListener("change", (e) => {
    const value = e.target.value;
    localStorage.setItem("fat:language", value);
    if (value == "id") {
      // jQuery("#\\:1\\.container").contents().find("#\\:1\\.restore").click();
      const container = document.getElementById(":1.container");
      const restoreButton =
        container.contentDocument.getElementById(":1.restore");
      restoreButton.dispatchEvent(new MouseEvent("click"));
    } else {
      doGTranslate(`id|${value}`);
    }
  });
};
