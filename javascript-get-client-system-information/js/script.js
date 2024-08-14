function saveUserInfo(ui) {
  localStorage.setItem("userinfo", JSON.stringify(userInfo));
}

function getUserInfo() {
  return JSON.parse(localStorage.getItem("userinfo") || "{}");
}

function setClassFromObjectProperties(obj, bStorePropAndValue) {
  for (prop in obj) {
    // Find elements which have "data-propname" set. If prop name for instance is "city"
    // These elements will be hit: [span data-city="attribut target || 'empty'" /]
    // The "attribut target" will be set to the value of the object property.
    // If you want city to goto "title" use: data-target="title".
    // Leave empty (blank) to set Element innerText
    var sAttributeName = "data-" + prop;
    var sAttributeNameIf = "data-if-" + prop;
    var valueOfProp = obj[prop];
    var elements = Array.from(
      document.querySelectorAll("[" + sAttributeName + "]")
    );
    if (elements.length === 0) {
      console.log(sAttributeName + " is not used");
    } else {
      elements.map(function (element, i) {
        var attributeTarget = element.getAttribute(sAttributeName);
        if (attributeTarget !== "") {
          // If the user want the value to be set to a given attribute
          // we will set that attribute to the value
          element.setAttribute(attributeTarget, valueOfProp);
        } else {
          element.innerText = valueOfProp;
          if (bStorePropAndValue || false) {
            element.setAttribute("data-prop", prop);
            element.setAttribute("data-val", valueOfProp);
          }
        }
        var showIf = element.getAttribute(sAttributeNameIf);
        if (showIf) {
          try {
            let value = valueOfProp;
            element.style.display = eval(showIf) ? "block" : "none";
            console.log(element.style.display);
          } catch (e) {
            console.log('Could not eval "' + sAttributeNameIf + '"');
          }
        }
      });
    }
  }
}

function doRequest(url, cb) {
  var oReq = new XMLHttpRequest();
  oReq.onload = cb;
  oReq.open("get", url, true);
  oReq.send();
}

function reqListener() {
  userInfo = {
    time: new Date(),
    userinfo: JSON.parse(this.responseText)
  };
  saveUserInfo(userInfo);
  setClassFromObjectProperties(userInfo.userinfo, bStorePropAndValue);
  showMore();
}

function showMore() {
  var more = {
    time: new Date(userInfo.time).toUTCString(),
    welcome: bReturning ? "Welcome back!" : "First time here?"
  };
  setClassFromObjectProperties(more);
}

var userInfo = getUserInfo(),
  ipinfo = "https://ipinfo.io/json",
  bStorePropAndValue = true,
  bReturning = true;

if (!!!("time" in userInfo)) {
  // New visitor
  bReturning = false;
  doRequest(ipinfo, reqListener);
} else {
  // Returning visitor
  setClassFromObjectProperties(userInfo.userinfo, bStorePropAndValue);
  showMore();
}

//  Get User agent and devices
//  That is pure Javascript
function $(selector) {
  const self = {
    element: document.querySelector(selector),
    detect: () => {
      (function () {
        "use strict";

        var module = {
          options: [],
          header: [
            navigator.platform,
            navigator.userAgent,
            navigator.appVersion,
            navigator.vendor,
            window.opera
          ],
          dataos: [
            { name: "Windows Phone", value: "Windows Phone", version: "OS" },
            { name: "Windows", value: "Win", version: "NT" },
            { name: "iPhone", value: "iPhone", version: "OS" },
            { name: "iPad", value: "iPad", version: "OS" },
            { name: "Kindle", value: "Silk", version: "Silk" },
            { name: "Android", value: "Android", version: "Android" },
            { name: "PlayBook", value: "PlayBook", version: "OS" },
            { name: "BlackBerry", value: "BlackBerry", version: "/" },
            { name: "Macintosh", value: "Mac", version: "OS X" },
            { name: "Linux", value: "Linux", version: "rv" },
            { name: "Palm", value: "Palm", version: "PalmOS" }
          ],
          databrowser: [
            { name: "Chrome", value: "Chrome", version: "Chrome" },
            { name: "Firefox", value: "Firefox", version: "Firefox" },
            { name: "Safari", value: "Safari", version: "Version" },
            { name: "Internet Explorer", value: "MSIE", version: "MSIE" },
            { name: "Opera", value: "Opera", version: "Opera" },
            { name: "BlackBerry", value: "CLDC", version: "CLDC" },
            { name: "Mozilla", value: "Mozilla", version: "Mozilla" }
          ],
          init: function () {
            var agent = this.header.join(" "),
              os = this.matchItem(agent, this.dataos),
              browser = this.matchItem(agent, this.databrowser);

            return { os: os, browser: browser };
          },
          matchItem: function (string, data) {
            var i = 0,
              j = 0,
              html = "",
              regex,
              regexv,
              match,
              matches,
              version;

            for (i = 0; i < data.length; i += 1) {
              regex = new RegExp(data[i].value, "i");
              match = regex.test(string);
              if (match) {
                regexv = new RegExp(data[i].version + "[- /:;]([\\\\d._]+)", "i");
                matches = string.match(regexv);
                version = "";
                if (matches) {
                  if (matches[1]) {
                    matches = matches[1];
                  }
                }
                if (matches) {
                  matches = matches.split(/[._]+/);
                  for (j = 0; j < matches.length; j += 1) {
                    if (j === 0) {
                      version += matches[j] + ".";
                    } else {
                      version += matches[j];
                    }
                  }
                } else {
                  version = "0";
                }
                return {
                  name: data[i].name,
                  version: parseFloat(version)
                };
              }
            }
            return { name: "unknown", version: 0 };
          }
        };

        var e = module.init(),
          debug = "";

        debug +=
          "<tr>" +
          "<th>" +
          "Os" +
          "</th>" +
          "<td>" +
          e.os.name +
          "</td>" +
          "</tr>";
        debug +=
          "<tr>" +
          "<th>" +
          "Os Version" +
          "</th>" +
          "<td>" +
          e.os.version +
          "</td>" +
          "</tr>";
        debug +=
          "<tr>" +
          "<th>" +
          "Browser" +
          "</th>" +
          "<td>" +
          e.browser.name +
          "</td>" +
          "</tr>";
        debug +=
          "<tr>" +
          "<th>" +
          "Browser Version" +
          "</th>" +
          "<td>" +
          e.browser.version +
          "</td>" +
          "</tr>";
        debug +=
          "<tr>" +
          "<th>" +
          "User Agent" +
          "</th>" +
          "<td>" +
          navigator.userAgent +
          "</td>" +
          "</tr>";
        debug +=
          "<tr>" +
          "<th>" +
          "App Version" +
          "</th>" +
          "<td>" +
          navigator.appVersion +
          "</td>" +
          "</tr>";
        debug +=
          "<tr>" +
          "<th>" +
          "Platform Version" +
          "</th>" +
          "<td>" +
          navigator.platform +
          "</td>" +
          "</tr>";
        debug +=
          "<tr>" +
          "<th>" +
          "Vendor" +
          "</th>" +
          "<td>" +
          navigator.vendor +
          "</td>" +
          "</tr>";

        self.element.innerHTML = debug;
      })();
    },
    date: () => {
      let time = new Date();
      self.element.innerHTML = time;
    }
  };

  return self;
}

setInterval(function () {
  for (let i = 0; i < 16; i++) {
    $("#output").detect();
  }
}, 1000);