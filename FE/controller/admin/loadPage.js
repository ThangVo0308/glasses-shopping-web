$(document).ready(async () => {
    let url = window.location.href;
    if (url.indexOf("admin.php") != -1) {
      
        let tab = document.querySelector("#header .top .top-menu .tab-title");
        if (tab != null) tab.click();
      }
  });
  const removeColorTab = () => {
    let tabActive = document.querySelector("#header .tab-title.active");
    if (tabActive != null) tabActive.classList.remove("active");
  };
  const loadPageByAjax = async (pageTarget) => {
    $.ajax({
      url: "../FE/html/admin/content.php",
      type: "POST",
      data: { page: pageTarget },
      dataType: "html",
      success: function (data) {
        document.querySelector("#content").innerHTML = data;
      },
    });
  };
  const selectMenuAdmin = (selectedTab, pageTarget) => {
    removeColorTab();
    selectedTab.classList.add("active");
    loadPageByAjax(pageTarget);
  }
const loadModalBoxByAjax = (modalBoxTarget, id) => {
    $.ajax({
      url: "../FE/html/admin/modalBox.php",
      type: "POST",
      data: { modalBox: modalBoxTarget, id: id },
      dataType: "html",
      success: function (data) {
        document.querySelector("#modal-box").innerHTML = data;
      },
    });
  };
  
