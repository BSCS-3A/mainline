function setBarWidth(dataElement, barElement, cssProperty, barPercent) {
    var listData = [];
    $(dataElement).each(function() {
      listData.push($(this).html());
    });
    var listMax = Math.max.apply(Math, listData);
    $(barElement).each(function(index) {
      $(this).css(cssProperty, (listData[index] / listMax) * barPercent + "%");
    });
  }
  setBarWidth(".style-4 span", ".style-4 span", "padding-left", 65);