! function () {
  "use strict";
  var e, t = {
      548: function (e, t, i) {
        var n = i(358),
          r = i(92);
        n.p8.registerPlugin(r.i);
        class o {
          constructor() {
            this.timer = [], this.init()
          }
          init() {
            this.eventBind(), this.setNavHeight(), this.stickyNav()
          }
          stickyNav() {
            const e = document.querySelector(".movie"),
              t = [...document.querySelectorAll(".js-mvsticky")];
            t.forEach((e => e.classList.add("-fixed"))), r.i.create({
              trigger: e,
              start: "top 100%",
              onEnter: () => {
                t.forEach((e => e.classList.remove("-fixed")))
              },
              onLeaveBack: () => {
                t.forEach((e => e.classList.add("-fixed")))
              }
            })
          }
          setNavHeight() {
            const e = document.querySelector(".mainvisual__change__row");
            document.documentElement.style.setProperty("--navHeight", `${e.offsetHeight}px`)
          }
          clearTimer() {
            this.timer.forEach((e => {
              clearTimeout(e)
            }))
          }
          eventBind() {
            const e = document.querySelector(".mainvisual"),
              t = [...document.querySelectorAll(".js-charachangebtn")],
              i = document.querySelector(".mainvisual__change__curtain");
            let n = document.body.getAttribute("data-character") || "all";
            [...document.querySelectorAll(`.js-charachangebtn[data-character="${n}"]`)].forEach((e => e.classList.add("-active")));
            const r = document.querySelector(".mainvisual__change");
            r.addEventListener("click", (() => {
              window.innerWidth <= 834 && r.classList.toggle("-open")
            })), t.forEach((r => {
              r.addEventListener("click", (() => {
                const o = r.getAttribute("data-character");
                o === n || window.innerWidth <= 834 && !r.closest(".mainvisual__change").classList.contains("-open") || (e.classList.remove("-change"), this.clearTimer(), t.forEach((e => e.classList.remove("-active"))), r.classList.add("-active"), i.classList.add("-anim"), document.body.setAttribute("data-character", o), this.timer.push(setTimeout((() => {
                  e.classList.add("-change")
                }), 1)), this.timer.push(setTimeout((() => {
                  n = o
                }), 100)))
              }))
            })), i.addEventListener("animationend", (() => {
              i.classList.remove("-anim")
            }))
          }
        }
        var s = i(127);
        n.p8.registerPlugin(r.i), n.p8.registerPlugin(s.L);
        class c {
          constructor() {
            this.init()
          }
          init() {
            this.onScroll(), this.movieScroll()
          }
          onScroll() {}
          movieScroll() {
            const e = document.querySelector(".top__scroller"),
              t = [...document.querySelectorAll(".js-moviepn")];
            let i;
            const r = [...document.querySelectorAll(".movie__item")],
              o = () => {
                i = 0, r.forEach((e => {
                  const t = window.innerWidth <= 835 ? 14 : 20;
                  i += e.offsetWidth + t
                }))
              };
            o(), window.addEventListener("resize", o), t.forEach((t => {
              t.addEventListener("click", (() => {
                const i = "prev" === t.getAttribute("data-dir") ? -1 : 1,
                  r = document.querySelector(".movie__item");
                n.p8.to(e, {
                  duration: .6,
                  scrollTo: {
                    x: e.scrollLeft + i * (r.offsetWidth + 20)
                  },
                  ease: "circ.inOut"
                })
              }))
            })), e.addEventListener("scroll", (() => {
              const t = e.scrollLeft / (i - e.offsetWidth);
              t >= 0 && document.documentElement.style.setProperty("--movieprogress", 100 * t + "%")
            }))
          }
        }
        var a = i(192),
          l = i.n(a);
        class d {
          constructor() {
            this.init()
          }
          init() {
            const e = document.querySelector(".js-logoanimelm"),
              t = new(l())(".loader__logotxt", {
                delay: 20
              }),
              i = document.getElementById("countdown__modal");
            setTimeout((() => {
              t.typeString("MANGA TIME<br />KR COMICS<br />BOCCHI<br />THE窶廨UITAR HERO窶�<br />ROCK STORY").start()
            }), 2500), setTimeout((() => {
              document.body.classList.add("-introend"), e.setAttribute("src", "/assets/img/page/top/mainvisual/ph_logo_anim_y.png")
            }), 5500), i && setTimeout((() => {
              i.classList.add("-active"), document.body.classList.add("-lock")
            }), 6500), document.body.setAttribute("data-introtheme", Math.floor(4 * Math.random()) + 1)
          }
        }
        var u = i(68);
        class m {
          constructor() {
            this.init()
          }
          init() {
            this.setSwiper()
          }
          setSwiper() {
            new u.Z(".bnr__cont", {
              autoplay: {
                delay: 5e3
              },
              loop: !0,
              pagination: {
                el: ".swiper-pagination",
                clickable: !0
              }
            })
          }
        }
        new class {
          constructor() {
            this.CharaChange = new o, this.ScrollFunc = new c, this.Loader = new d, this.Bnr = new m, this.init()
          }
          init() {
            this.setScroller()
          }
          setScroller() {
            const e = document.querySelector(".mainvisual"),
              t = [...document.querySelectorAll(".js-fxdelm")],
              i = () => {
                e.offsetHeight > window.innerHeight ? t.forEach((e => e.classList.add("-fixed"))) : t.forEach((e => e.classList.remove("-fixed")))
              };
            window.addEventListener("resize", i), i()
          }
        }
      }
    },
    i = {};

  function n(e) {
    var r = i[e];
    if (void 0 !== r) return r.exports;
    var o = i[e] = {
      id: e,
      exports: {}
    };
    return t[e].call(o.exports, o, o.exports, n), o.exports
  }
  n.m = t, e = [], n.O = function (t, i, r, o) {
      if (!i) {
        var s = 1 / 0;
        for (d = 0; d < e.length; d++) {
          i = e[d][0], r = e[d][1], o = e[d][2];
          for (var c = !0, a = 0; a < i.length; a++)(!1 & o || s >= o) && Object.keys(n.O).every((function (e) {
            return n.O[e](i[a])
          })) ? i.splice(a--, 1) : (c = !1, o < s && (s = o));
          if (c) {
            e.splice(d--, 1);
            var l = r();
            void 0 !== l && (t = l)
          }
        }
        return t
      }
      o = o || 0;
      for (var d = e.length; d > 0 && e[d - 1][2] > o; d--) e[d] = e[d - 1];
      e[d] = [i, r, o]
    }, n.n = function (e) {
      var t = e && e.__esModule ? function () {
        return e.default
      } : function () {
        return e
      };
      return n.d(t, {
        a: t
      }), t
    }, n.d = function (e, t) {
      for (var i in t) n.o(t, i) && !n.o(e, i) && Object.defineProperty(e, i, {
        enumerable: !0,
        get: t[i]
      })
    }, n.o = function (e, t) {
      return Object.prototype.hasOwnProperty.call(e, t)
    }, n.j = 511,
    function () {
      var e = {
        511: 0
      };
      n.O.j = function (t) {
        return 0 === e[t]
      };
      var t = function (t, i) {
          var r, o, s = i[0],
            c = i[1],
            a = i[2],
            l = 0;
          if (s.some((function (t) {
              return 0 !== e[t]
            }))) {
            for (r in c) n.o(c, r) && (n.m[r] = c[r]);
            if (a) var d = a(n)
          }
          for (t && t(i); l < s.length; l++) o = s[l], n.o(e, o) && e[o] && e[o][0](), e[o] = 0;
          return n.O(d)
        },
        i = self.webpackChunkbuild = self.webpackChunkbuild || [];
      i.forEach(t.bind(null, 0)), i.push = t.bind(null, i.push.bind(i))
    }(), n.nc = void 0;
  var r = n.O(void 0, [736], (function () {
    return n(548)
  }));
  r = n.O(r)
}();
//# sourceMappingURL=../maps/page/top.js.map



! function () {
  "use strict";
  var e, t = {
      24: function (e, t, o) {
        class n {
          constructor(e, t) {
            this.target = this.convertElement(e), this.nodes = [...this.target.childNodes], this.convert(t)
          }
          convert(e) {
            let t = "";
            this.nodes.forEach((o => {
              if (3 == o.nodeType) {
                const n = o.textContent.replace(/\r?\n/g, "");
                t += n.split("").reduce(((t, o) => e ? t + `<span class="parent"><span class="child">${o}</span></span>` : t + `<span>${o}</span>`), "")
              } else t += o.outerHTML
            })), this.target.innerHTML = t
          }
          convertElement(e) {
            return e instanceof HTMLElement ? e : document.querySelector(e)
          }
        }
        class r {
          constructor() {
            this.init()
          }
          init() {
            this.eventBind()
          }
          resetEvent() {
            this.eventBind("reset")
          }
          eventBind(e) {
            const t = [...document.querySelectorAll(".js-modal_open")],
              o = [...document.querySelectorAll(".js-modal_close")],
              n = [...document.querySelectorAll(".js-modal")],
              r = e => {
                e.preventDefault();
                const t = e.currentTarget.getAttribute("data-modalID"),
                  o = document.querySelector(`.js-modal[data-modalID=${t}]`);
                document.body.classList.add("-lock"), o && o.classList.add("-active")
              },
              c = e => {
                document.body.classList.remove("-lock"), n.forEach((e => e.classList.remove("-active")))
              };
            t.forEach((t => {
              e && t.removeEventListener("click", r), t.addEventListener("click", r)
            })), o.forEach((t => {
              e && t.removeEventListener("click", c), t.addEventListener("click", c)
            }))
          }
        }
        var c = o(358),
          s = o(92),
          i = o(127);
        c.p8.registerPlugin(s.i), c.p8.registerPlugin(i.L);
        class l {
          constructor() {
            this.init()
          }
          init() {
            this.onScroll(), this.smoothScroll()
          }
          onScroll() {
            [...document.querySelectorAll(".js-scrollreveal")].forEach((e => {
              s.i.create({
                trigger: e,
                start: "top 85%",
                onEnter: () => {
                  e.classList.add("-reveal")
                }
              })
            })), [...document.querySelectorAll(".js-scrolltrigger")].forEach((e => {
              s.i.create({
                trigger: e,
                start: "top",
                onEnter: () => {
                  document.body.classList.add("-triggerscrolled")
                },
                onLeaveBack: () => {
                  document.body.classList.remove("-triggerscrolled")
                }
              })
            }))
          }
          smoothScroll() {
            const e = [...document.querySelectorAll(".js-smoothscroll")],
              t = [...document.querySelectorAll(".js-pagetop")];
            e.forEach((e => {
              e.addEventListener("click", (t => {
                t.preventDefault();
                const o = e.getAttribute("href"),
                  n = window.innerWidth <= 768 ? .083 * window.innerWidth : 80;
                c.p8.to(window, {
                  duration: 1,
                  scrollTo: {
                    y: o,
                    offsetY: n
                  },
                  ease: "circ.inOut"
                })
              }))
            })), t.forEach((e => {
              e.addEventListener("click", (e => {
                e.preventDefault(), c.p8.to(window, {
                  duration: 1,
                  scrollTo: {
                    y: 0
                  },
                  ease: "circ.inOut"
                })
              }))
            }))
          }
        }
        class a {
          constructor() {
            this.player = null, this.init()
          }
          init() {
            null !== document.querySelector(".js-moviemodal_btn") && (this.setup(), this.eventBind())
          }
          resetEvent() {
            this.eventBind("reset")
          }
          setup() {
            const e = document.createElement("script"),
              t = document.querySelectorAll(".js-moviemodal_btn")[0].getAttribute("data-videoID"),
              o = [...document.querySelectorAll(".js-modal_movie_change")];
            e.src = "https://www.youtube.com/iframe_api";
            const n = document.getElementsByTagName("script")[0];
            n.parentNode.insertBefore(e, n), window.onYouTubeIframeAPIReady = () => {
              this.player = new YT.Player("player", {
                height: "360",
                width: "640",
                videoId: t,
                events: {
                  onStateChange: this.onStateChange.bind(this),
                  onError: this.onError
                }
              })
            }, o.forEach(((e, t) => {
              0 === t && e.classList.add("-active")
            }))
          }
          onError(e) {
            console.log(e)
          }
          onStateChange(e) {
            3 === e.data && setTimeout((() => {
              document.querySelector(".c-modal_movie__iframewrap").style.opacity = 1
            }), 200)
          }
          eventBind(e) {
            const t = [...document.querySelectorAll(".js-modal_open")],
              o = [...document.querySelectorAll(".js-modal_close")],
              n = document.querySelector(".c-modal_movie__iframewrap"),
              r = [...document.querySelectorAll(".js-modal_movie_change")],
              c = () => {
                this.player.stopVideo(), n.style.opacity = 0
              },
              s = e => {
                const t = e.currentTarget.getAttribute("data-videoID");
                this.loadVideo(t), r.forEach((e => {
                  e.classList.remove("-active"), e.getAttribute("data-videoID") === t && e.classList.add("-active")
                }))
              };
            r.forEach((e => {
              e.addEventListener("click", s)
            })), t.forEach((t => {
              e && t.removeEventListener("click", s), t.addEventListener("click", s)
            })), o.forEach((t => {
              e && t.removeEventListener("click", c), t.addEventListener("click", c)
            }))
          }
          loadVideo(e) {
            this.player.loadVideoById({
              videoId: e
            })
          }
        }
        new class {
          constructor() {
            this.modal = new r, this.scrollFunc = new l, this.movie = new a, this.init()
          }
          init() {
            document.documentElement.style.setProperty("--screenHeight", `${window.innerHeight}px`), document.documentElement.style.setProperty("--pageHeight", `${document.body.clientHeight}px`),
              function () {
                const e = [...document.querySelectorAll(".js-gnav_open")],
                  t = [...document.querySelectorAll(".js-gnav_close")];
                e.forEach((e => {
                  e.addEventListener("click", (() => {
                    document.body.classList.add("-gnav_open"), document.body.classList.add("-lock")
                  }))
                })), t.forEach((e => {
                  e.addEventListener("click", (() => {
                    document.body.classList.remove("-gnav_open"), document.body.classList.remove("-lock")
                  }))
                })), window.addEventListener("resize", (() => {
                  window.innerWidth > 1440 && document.body.classList.contains("-gnav_open") && (document.body.classList.remove("-gnav_open"), document.body.classList.remove("-lock"))
                }))
              }(),
              function () {
                const e = document.querySelector(".mv"),
                  t = document.querySelector(".l-loader"),
                  o = () => {
                    t && t.classList.remove("-active"), document.body.classList.add("-ready"), setTimeout((() => {
                      document.body.classList.add("-readyend")
                    }), 2e3)
                  };
                if (e) {
                  const e = window.innerWidth <= 865 ? "_nrw" : "",
                    t = [!1, !1, !1];
                  [`./assets/img/top/mv/visual/ph_visual_1${e}.jpg`, `./assets/img/top/mv/visual/ph_visual_2${e}.jpg`, `./assets/img/top/mv/visual/ph_visual_3${e}.jpg`].forEach(((e, o) => {
                    const n = new Image;
                    n.src = e, n.addEventListener("load", (() => {
                      t[o] = !0
                    }))
                  }));
                  const n = () => {
                    !0 === t[0] && !0 === t[1] && !0 === t[2] ? setTimeout((() => {
                      o()
                    }), 500) : setTimeout(n, 100)
                  };
                  n()
                } else o()
              }(),
              function () {
                const e = document.querySelector(".js-pageheadertxt");
                if (!e) return;
                new n(e, "nestTrue");
                let t = 0;
                const o = () => {
                  [...document.querySelectorAll(".js-pageheadertxt .child")].forEach((e => {
                    e.classList.remove("-fill"), Math.random() >= .5 && e.classList.add("-fill")
                  })), t < 8 && (setTimeout(o, 200), t++)
                };
                o()
              }(),
              function () {
                const e = document.querySelector(".l-footer"),
                  t = document.querySelector(".l-fxdshare");
                new IntersectionObserver((function (e, o) {
                  e.forEach((function (e) {
                    e.isIntersecting ? t.classList.remove("-active") : t.classList.add("-active")
                  }))
                }), {
                  root: null,
                  rootMargin: "0px",
                  threshold: [0]
                }).observe(e)
              }(),
              function () {
                const e = [...document.querySelectorAll(".js-comment_open")],
                  t = [...document.querySelectorAll(".js-comment_close")];
                e.forEach((e => {
                  e.addEventListener("click", (e => {
                    e.preventDefault(), e.stopPropagation(), document.body.classList.add("-comment_modal")
                  }))
                })), t.forEach((e => {
                  e.addEventListener("click", (() => {
                    document.body.classList.remove("-comment_modal")
                  }))
                }))
              }()
          }
          resetModalEvents() {
            this.modal.resetEvent()
          }
        }
      }
    },
    o = {};

  function n(e) {
    var r = o[e];
    if (void 0 !== r) return r.exports;
    var c = o[e] = {
      id: e,
      exports: {}
    };
    return t[e].call(c.exports, c, c.exports, n), c.exports
  }
  n.m = t, e = [], n.O = function (t, o, r, c) {
      if (!o) {
        var s = 1 / 0;
        for (d = 0; d < e.length; d++) {
          o = e[d][0], r = e[d][1], c = e[d][2];
          for (var i = !0, l = 0; l < o.length; l++)(!1 & c || s >= c) && Object.keys(n.O).every((function (e) {
            return n.O[e](o[l])
          })) ? o.splice(l--, 1) : (i = !1, c < s && (s = c));
          if (i) {
            e.splice(d--, 1);
            var a = r();
            void 0 !== a && (t = a)
          }
        }
        return t
      }
      c = c || 0;
      for (var d = e.length; d > 0 && e[d - 1][2] > c; d--) e[d] = e[d - 1];
      e[d] = [o, r, c]
    }, n.n = function (e) {
      var t = e && e.__esModule ? function () {
        return e.default
      } : function () {
        return e
      };
      return n.d(t, {
        a: t
      }), t
    }, n.d = function (e, t) {
      for (var o in t) n.o(t, o) && !n.o(e, o) && Object.defineProperty(e, o, {
        enumerable: !0,
        get: t[o]
      })
    }, n.o = function (e, t) {
      return Object.prototype.hasOwnProperty.call(e, t)
    }, n.j = 592,
    function () {
      var e = {
        592: 0
      };
      n.O.j = function (t) {
        return 0 === e[t]
      };
      var t = function (t, o) {
          var r, c, s = o[0],
            i = o[1],
            l = o[2],
            a = 0;
          if (s.some((function (t) {
              return 0 !== e[t]
            }))) {
            for (r in i) n.o(i, r) && (n.m[r] = i[r]);
            if (l) var d = l(n)
          }
          for (t && t(o); a < s.length; a++) c = s[a], n.o(e, c) && e[c] && e[c][0](), e[c] = 0;
          return n.O(d)
        },
        o = self.webpackChunkbuild = self.webpackChunkbuild || [];
      o.forEach(t.bind(null, 0)), o.push = t.bind(null, o.push.bind(o))
    }(), n.nc = void 0;
  var r = n.O(void 0, [736], (function () {
    return n(24)
  }));
  r = n.O(r)
}();
//# sourceMappingURL=maps/common.js.map