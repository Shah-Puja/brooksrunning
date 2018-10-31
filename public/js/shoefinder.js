(this, document, function(t, e, i, s) {
    var n, o;
    ! function(t, e, i, s) {
        function n(t) {
            for (; t && void 0 !== t.originalEvent;) t = t.originalEvent;
            return t
        }

        function o(e) {
            for (var i, s, n = {}; e;) {
                i = t.data(e, y);
                for (s in i) i[s] && (n[s] = n.hasVirtualBinding = !0);
                e = e.parentNode
            }
            return n
        }

        function a() {
            z = !0
        }

        function r() {
            z = !1
        }

        function l() {
            h(), S = setTimeout(function() {
                S = 0, $ = 0, F.length = 0, E = !1, a()
            }, t.vmouse.resetTimerDuration)
        }

        function h() {
            S && (clearTimeout(S), S = 0)
        }

        function c(e, i, o) {
            var a;
            return (o && o[e] || !o && function(e, i) {
                for (var s; e;) {
                    if ((s = t.data(e, y)) && (!i || s[i])) return e;
                    e = e.parentNode
                }
                return null
            }(i.target, e)) && (a = function(e, i) {
                var o, a, r, l, h, c, u, d, p, f = e.type;
                if ((e = t.Event(e)).type = i, o = e.originalEvent, a = t.event.props, f.search(/^(mouse|click)/) > -1 && (a = T), o)
                    for (u = a.length; u;) l = a[--u], e[l] = o[l];
                if (f.search(/mouse(down|up)|click/) > -1 && !e.which && (e.which = 1), -1 !== f.search(/^touch/) && (f = (r = n(o)).touches, h = r.changedTouches, c = f && f.length ? f[0] : h && h.length ? h[0] : s))
                    for (d = 0, p = C.length; p > d; d++) l = C[d], e[l] = c[l];
                return e
            }(i, e), t(i.target).trigger(a)), a
        }

        function u(e) {
            var i = t.data(e.target, _);
            if (!(E || $ && $ === i)) {
                var s = c("v" + e.type, e);
                s && (s.isDefaultPrevented() && e.preventDefault(), s.isPropagationStopped() && e.stopPropagation(), s.isImmediatePropagationStopped() && e.stopImmediatePropagation())
            }
        }

        function d(e) {
            var i, s, a = n(e).touches;
            if (a && 1 === a.length && (s = o(i = e.target)).hasVirtualBinding) {
                $ = N++, t.data(i, _, $), h(), r(), I = !1;
                var l = n(e).touches[0];
                P = l.pageX, M = l.pageY, c("vmouseover", e, s), c("vmousedown", e, s)
            }
        }

        function p(t) {
            z || (I || c("vmousecancel", t, o(t.target)), I = !0, l())
        }

        function f(e) {
            if (!z) {
                var i = n(e).touches[0],
                    s = I,
                    a = t.vmouse.moveDistanceThreshold,
                    r = o(e.target);
                (I = I || Math.abs(i.pageX - P) > a || Math.abs(i.pageY - M) > a) && !s && c("vmousecancel", e, r), c("vmousemove", e, r), l()
            }
        }

        function m(t) {
            if (!z) {
                a();
                var e, i = o(t.target);
                if (c("vmouseup", t, i), !I) {
                    var s = c("vclick", t, i);
                    s && s.isDefaultPrevented() && (e = n(t).changedTouches[0], F.push({
                        touchID: $,
                        x: e.clientX,
                        y: e.clientY
                    }), E = !0)
                }
                c("vmouseout", t, i), I = !1, l()
            }
        }

        function g(e) {
            var i, s = t.data(e, y);
            if (s)
                for (i in s)
                    if (s[i]) return !0;
            return !1
        }

        function v() {}

        function b(e) {
            var i = e.substr(1);
            return {
                setup: function(s, n) {
                    g(this) || t.data(this, y, {}), t.data(this, y)[e] = !0, D[e] = (D[e] || 0) + 1, 1 === D[e] && L.bind(i, u), t(this).bind(i, v), A && (D.touchstart = (D.touchstart || 0) + 1, 1 === D.touchstart && L.bind("touchstart", d).bind("touchend", m).bind("touchmove", f).bind("scroll", p))
                },
                teardown: function(s, n) {
                    --D[e], D[e] || L.unbind(i, u), A && (--D.touchstart, D.touchstart || L.unbind("touchstart", d).unbind("touchmove", f).unbind("touchend", m).unbind("scroll", p));
                    var o = t(this),
                        a = t.data(this, y);
                    a && (a[e] = !1), o.unbind(i, v), g(this) || o.removeData(y)
                }
            }
        }
        var w, y = "virtualMouseBindings",
            _ = "virtualTouchID",
            x = "vmouseover vmousedown vmousemove vmouseup vclick vmouseout vmousecancel".split(" "),
            C = "clientX clientY pageX pageY screenX screenY".split(" "),
            k = t.event.mouseHooks ? t.event.mouseHooks.props : [],
            T = t.event.props.concat(k),
            D = {},
            S = 0,
            P = 0,
            M = 0,
            I = !1,
            F = [],
            E = !1,
            z = !1,
            A = "addEventListener" in i,
            L = t(i),
            N = 1,
            $ = 0;
        t.vmouse = {
            moveDistanceThreshold: 10,
            clickDistanceThreshold: 10,
            resetTimerDuration: 1500
        };
        for (var O = 0; O < x.length; O++) t.event.special[x[O]] = b(x[O]);
        A && i.addEventListener("click", function(e) {
            var i, s, n, o, a, r = F.length,
                l = e.target;
            if (r)
                for (i = e.clientX, s = e.clientY, w = t.vmouse.clickDistanceThreshold, n = l; n;) {
                    for (o = 0; r > o; o++)
                        if (a = F[o], 0, n === l && Math.abs(a.x - i) < w && Math.abs(a.y - s) < w || t.data(n, _) === a.touchID) return e.preventDefault(), void e.stopPropagation();
                    n = n.parentNode
                }
        }, !0)
    }(t, 0, i), t.mobile = {}, o = {
            touch: "ontouchend" in i
        }, (n = t).mobile.support = n.mobile.support || {}, n.extend(n.support, o), n.extend(n.mobile.support, o),
        function(t, e, s) {
            function n(e, i, s) {
                var n = s.type;
                s.type = i, t.event.dispatch.call(e, s), s.type = n
            }
            var o = t(i);
            t.each("touchstart touchmove touchend tap taphold swipe swipeleft swiperight scrollstart scrollstop".split(" "), function(e, i) {
                t.fn[i] = function(t) {
                    return t ? this.bind(i, t) : this.trigger(i)
                }, t.attrFn && (t.attrFn[i] = !0)
            });
            var a = t.mobile.support.touch,
                r = a ? "touchstart" : "mousedown",
                l = a ? "touchend" : "mouseup",
                h = a ? "touchmove" : "mousemove";
            t.event.special.scrollstart = {
                enabled: !0,
                setup: function() {
                    function e(t, e) {
                        n(o, (i = e) ? "scrollstart" : "scrollstop", t)
                    }
                    var i, s, o = this;
                    t(o).bind("touchmove scroll", function(n) {
                        t.event.special.scrollstart.enabled && (i || e(n, !0), clearTimeout(s), s = setTimeout(function() {
                            e(n, !1)
                        }, 50))
                    })
                }
            }, t.event.special.tap = {
                tapholdThreshold: 750,
                setup: function() {
                    var e = this,
                        i = t(e);
                    i.bind("vmousedown", function(s) {
                        function a() {
                            clearTimeout(h)
                        }

                        function r() {
                            a(), i.unbind("vclick", l).unbind("vmouseup", a), o.unbind("vmousecancel", r)
                        }

                        function l(t) {
                            r(), c === t.target && n(e, "tap", t)
                        }
                        if (s.which && 1 !== s.which) return !1;
                        var h, c = s.target;
                        s.originalEvent, i.bind("vmouseup", a).bind("vclick", l), o.bind("vmousecancel", r), h = setTimeout(function() {
                            n(e, "taphold", t.Event("taphold", {
                                target: c
                            }))
                        }, t.event.special.tap.tapholdThreshold)
                    })
                }
            }, t.event.special.swipe = {
                scrollSupressionThreshold: 30,
                durationThreshold: 1e3,
                horizontalDistanceThreshold: 30,
                verticalDistanceThreshold: 75,
                start: function(e) {
                    var i = e.originalEvent.touches ? e.originalEvent.touches[0] : e;
                    return {
                        time: (new Date).getTime(),
                        coords: [i.pageX, i.pageY],
                        origin: t(e.target)
                    }
                },
                stop: function(t) {
                    var e = t.originalEvent.touches ? t.originalEvent.touches[0] : t;
                    return {
                        time: (new Date).getTime(),
                        coords: [e.pageX, e.pageY]
                    }
                },
                handleSwipe: function(e, i) {
                    i.time - e.time < t.event.special.swipe.durationThreshold && Math.abs(e.coords[0] - i.coords[0]) > t.event.special.swipe.horizontalDistanceThreshold && Math.abs(e.coords[1] - i.coords[1]) < t.event.special.swipe.verticalDistanceThreshold && e.origin.trigger("swipe").trigger(e.coords[0] > i.coords[0] ? "swipeleft" : "swiperight")
                },
                setup: function() {
                    var e = t(this);
                    e.bind(r, function(i) {
                        function s(e) {
                            o && (n = t.event.special.swipe.stop(e), Math.abs(o.coords[0] - n.coords[0]) > t.event.special.swipe.scrollSupressionThreshold && e.preventDefault())
                        }
                        var n, o = t.event.special.swipe.start(i);
                        e.bind(h, s).one(l, function() {
                            e.unbind(h, s), o && n && t.event.special.swipe.handleSwipe(o, n), o = n = void 0
                        })
                    })
                }
            }, t.each({
                scrollstop: "scrollstart",
                taphold: "tap",
                swipeleft: "swipe",
                swiperight: "swipe"
            }, function(e, i) {
                t.event.special[e] = {
                    setup: function() {
                        t(this).bind(i, t.noop)
                    }
                }
            })
        }(t)
}),
function(t) {
    var e = {
            vertical: !1,
            rtl: !1,
            start: 1,
            offset: 1,
            size: null,
            scroll: 3,
            visible: null,
            animation: "normal",
            easing: "swing",
            auto: 0,
            wrap: null,
            initCallback: null,
            setupCallback: null,
            reloadCallback: null,
            itemLoadCallback: null,
            itemFirstInCallback: null,
            itemFirstOutCallback: null,
            itemLastInCallback: null,
            itemLastOutCallback: null,
            itemVisibleInCallback: null,
            itemVisibleOutCallback: null,
            animationStepCallback: null,
            buttonNextHTML: "<div></div>",
            buttonPrevHTML: "<div></div>",
            buttonNextEvent: "click",
            buttonPrevEvent: "click",
            buttonNextCallback: null,
            buttonPrevCallback: null,
            itemFallbackDimension: null
        },
        i = !1;
    t(window).bind("load.jcarousel", function() {
        i = !0
    }), t.jcarousel = function(s, n) {
        this.options = t.extend({}, e, n || {}), this.autoStopped = this.locked = !1, this.buttonPrevState = this.buttonNextState = this.buttonPrev = this.buttonNext = this.list = this.clip = this.container = null, n && void 0 !== n.rtl || (this.options.rtl = "rtl" == (t(s).attr("dir") || t("html").attr("dir") || "").toLowerCase()), this.wh = this.options.vertical ? "height" : "width", this.lt = this.options.vertical ? "top" : this.options.rtl ? "right" : "left";
        for (var o = "", a = s.className.split(" "), r = 0; r < a.length; r++)
            if (-1 != a[r].indexOf("jcarousel-skin")) {
                t(s).removeClass(a[r]), o = a[r];
                break
            }
            "UL" == s.nodeName.toUpperCase() || "OL" == s.nodeName.toUpperCase() ? (this.list = t(s), this.clip = this.list.parents(".jcarousel-clip"), this.container = this.list.parents(".jcarousel-container")) : (this.container = t(s), this.list = this.container.find("ul,ol").eq(0), this.clip = this.container.find(".jcarousel-clip")), 0 === this.clip.size() && (this.clip = this.list.wrap("<div></div>").parent()), 0 === this.container.size() && (this.container = this.clip.wrap("<div></div>").parent()), "" !== o && -1 == this.container.parent()[0].className.indexOf("jcarousel-skin") && this.container.wrap('<div class=" ' + o + '"></div>'), this.buttonPrev = t(".jcarousel-prev", this.container), 0 === this.buttonPrev.size() && null !== this.options.buttonPrevHTML && (this.buttonPrev = t(this.options.buttonPrevHTML).appendTo(this.container)), this.buttonPrev.addClass(this.className("jcarousel-prev")), this.buttonNext = t(".jcarousel-next", this.container), 0 === this.buttonNext.size() && null !== this.options.buttonNextHTML && (this.buttonNext = t(this.options.buttonNextHTML).appendTo(this.container)), this.buttonNext.addClass(this.className("jcarousel-next")), this.clip.addClass(this.className("jcarousel-clip")).css({
            position: "relative"
        }), this.list.addClass(this.className("jcarousel-list")).css({
            overflow: "hidden",
            position: "relative",
            top: 0,
            margin: 0,
            padding: 0
        }).css(this.options.rtl ? "right" : "left", 0), this.container.addClass(this.className("jcarousel-container")).css({
            position: "relative"
        }), !this.options.vertical && this.options.rtl && this.container.addClass("jcarousel-direction-rtl").attr("dir", "rtl");
        var l = null !== this.options.visible ? Math.ceil(this.clipping() / this.options.visible) : null,
            h = this;
        if ((o = this.list.children("li")).size() > 0) {
            var c = 0,
                u = this.options.offset;
            o.each(function() {
                h.format(this, u++), c += h.dimension(this, l)
            }), this.list.css(this.wh, c + 100 + "px"), n && void 0 !== n.size || (this.options.size = o.size())
        }
        this.container.css("display", "block"), this.buttonNext.css("display", "block"), this.buttonPrev.css("display", "block"), this.funcNext = function() {
            h.next()
        }, this.funcPrev = function() {
            h.prev()
        }, this.funcResize = function() {
            h.resizeTimer && clearTimeout(h.resizeTimer), h.resizeTimer = setTimeout(function() {
                h.reload()
            }, 100)
        }, null !== this.options.initCallback && this.options.initCallback(this, "init"), !i && t.browser.safari ? (this.buttons(!1, !1), t(window).bind("load.jcarousel", function() {
            h.setup()
        })) : this.setup()
    };
    var s = t.jcarousel;
    s.fn = s.prototype = {
        jcarousel: "0.2.8"
    }, s.fn.extend = s.extend = t.extend, s.fn.extend({
        setup: function() {
            if (this.prevLast = this.prevFirst = this.last = this.first = null, this.animating = !1, this.tail = this.resizeTimer = this.timer = null, this.inTail = !1, !this.locked) {
                this.list.css(this.lt, this.pos(this.options.offset) + "px");
                var e = this.pos(this.options.start, !0);
                this.prevFirst = this.prevLast = null, this.animate(e, !1), t(window).unbind("resize.jcarousel", this.funcResize).bind("resize.jcarousel", this.funcResize), null !== this.options.setupCallback && this.options.setupCallback(this)
            }
        },
        reset: function() {
            this.list.empty(), this.list.css(this.lt, "0px"), this.list.css(this.wh, "10px"), null !== this.options.initCallback && this.options.initCallback(this, "reset"), this.setup()
        },
        reload: function() {
            if (null !== this.tail && this.inTail && this.list.css(this.lt, s.intval(this.list.css(this.lt)) + this.tail), this.tail = null, this.inTail = !1, null !== this.options.reloadCallback && this.options.reloadCallback(this), null !== this.options.visible) {
                var t = this,
                    e = Math.ceil(this.clipping() / this.options.visible),
                    i = 0,
                    n = 0;
                this.list.children("li").each(function(s) {
                    i += t.dimension(this, e), s + 1 < t.first && (n = i)
                }), this.list.css(this.wh, i + "px"), this.list.css(this.lt, -n + "px")
            }
            this.scroll(this.first, !1)
        },
        lock: function() {
            this.locked = !0, this.buttons()
        },
        unlock: function() {
            this.locked = !1, this.buttons()
        },
        size: function(t) {
            return void 0 !== t && (this.options.size = t, this.locked || this.buttons()), this.options.size
        },
        has: function(t, e) {
            void 0 !== e && e || (e = t), null !== this.options.size && e > this.options.size && (e = this.options.size);
            for (var i = t; e >= i; i++) {
                var s = this.get(i);
                if (!s.length || s.hasClass("jcarousel-item-placeholder")) return !1
            }
            return !0
        },
        get: function(e) {
            return t(">.jcarousel-item-" + e, this.list)
        },
        add: function(e, i) {
            var n = this.get(e),
                o = 0,
                a = t(i);
            if (0 === n.length) {
                var r, l = s.intval(e);
                for (n = this.create(e);;)
                    if (r = this.get(--l), 0 >= l || r.length) {
                        0 >= l ? this.list.prepend(n) : r.after(n);
                        break
                    }
            } else o = this.dimension(n);
            return "LI" == a.get(0).nodeName.toUpperCase() ? (n.replaceWith(a), n = a) : n.empty().append(i), this.format(n.removeClass(this.className("jcarousel-item-placeholder")), e), a = null !== this.options.visible ? Math.ceil(this.clipping() / this.options.visible) : null, o = this.dimension(n, a) - o, e > 0 && e < this.first && this.list.css(this.lt, s.intval(this.list.css(this.lt)) - o + "px"), this.list.css(this.wh, s.intval(this.list.css(this.wh)) + o + "px"), n
        },
        remove: function(t) {
            var e = this.get(t);
            if (e.length && !(t >= this.first && t <= this.last)) {
                var i = this.dimension(e);
                t < this.first && this.list.css(this.lt, s.intval(this.list.css(this.lt)) + i + "px"), e.remove(), this.list.css(this.wh, s.intval(this.list.css(this.wh)) - i + "px")
            }
        },
        next: function() {
            null === this.tail || this.inTail ? this.scroll("both" != this.options.wrap && "last" != this.options.wrap || null === this.options.size || this.last != this.options.size ? this.first + this.options.scroll : 1) : this.scrollTail(!1)
        },
        prev: function() {
            null !== this.tail && this.inTail ? this.scrollTail(!0) : this.scroll("both" != this.options.wrap && "first" != this.options.wrap || null === this.options.size || 1 != this.first ? this.first - this.options.scroll : this.options.size)
        },
        scrollTail: function(t) {
            if (!this.locked && !this.animating && this.tail) {
                this.pauseAuto();
                var e = s.intval(this.list.css(this.lt));
                e = t ? e + this.tail : e - this.tail;
                this.inTail = !t, this.prevFirst = this.first, this.prevLast = this.last, this.animate(e)
            }
        },
        scroll: function(t, e) {
            !this.locked && !this.animating && (this.pauseAuto(), this.animate(this.pos(t), e))
        },
        pos: function(t, e) {
            var i = s.intval(this.list.css(this.lt));
            if (this.locked || this.animating) return i;
            "circular" != this.options.wrap && (t = 1 > t ? 1 : this.options.size && t > this.options.size ? this.options.size : t);
            for (var n = this.first > t, o = "circular" != this.options.wrap && this.first <= 1 ? 1 : this.first, a = n ? this.get(o) : this.get(this.last), r = n ? o : o - 1, l = null, h = 0, c = !1, u = 0; n ? --r >= t : ++r < t;) l = this.get(r), c = !l.length, 0 === l.length && (l = this.create(r).addClass(this.className("jcarousel-item-placeholder")), a[n ? "before" : "after"](l), null !== this.first && "circular" == this.options.wrap && null !== this.options.size && (0 >= r || r > this.options.size)) && (a = this.get(this.index(r)), a.length && (l = this.add(r, a.clone(!0)))), a = l, u = this.dimension(l), c && (h += u), null !== this.first && ("circular" == this.options.wrap || r >= 1 && (null === this.options.size || r <= this.options.size)) && (i = n ? i + u : i - u);
            o = this.clipping();
            var d = [],
                p = 0,
                f = 0;
            for (a = this.get(t - 1), r = t; ++p;) {
                if (c = !(l = this.get(r)).length, 0 === l.length && (l = this.create(r).addClass(this.className("jcarousel-item-placeholder")), 0 === a.length ? this.list.prepend(l) : a[n ? "before" : "after"](l), null !== this.first && "circular" == this.options.wrap && null !== this.options.size && (0 >= r || r > this.options.size) && ((a = this.get(this.index(r))).length && (l = this.add(r, a.clone(!0))))), a = l, 0 === (u = this.dimension(l))) throw Error("jCarousel: No width/height set for items. This will cause an infinite loop. Aborting...");
                if ("circular" != this.options.wrap && null !== this.options.size && r > this.options.size ? d.push(l) : c && (h += u), (f += u) >= o) break;
                r++
            }
            for (l = 0; l < d.length; l++) d[l].remove();
            if (h > 0 && (this.list.css(this.wh, this.dimension(this.list) + h + "px"), n && (i -= h, this.list.css(this.lt, s.intval(this.list.css(this.lt)) - h + "px"))), h = t + p - 1, "circular" != this.options.wrap && this.options.size && h > this.options.size && (h = this.options.size), r > h)
                for (p = 0, r = h, f = 0; ++p && (l = this.get(r--), l.length) && (f += this.dimension(l), !(f >= o)););
            for (r = h - p + 1, "circular" != this.options.wrap && 1 > r && (r = 1), this.inTail && n && (i += this.tail, this.inTail = !1), this.tail = null, "circular" != this.options.wrap && h == this.options.size && h - p + 1 >= 1 && f - (n = s.intval(this.get(h).css(this.options.vertical ? "marginBottom" : "marginRight"))) > o && (this.tail = f - o - n), e && t === this.options.size && this.tail && (i -= this.tail, this.inTail = !0); t-- > r;) i += this.dimension(this.get(t));
            return this.prevFirst = this.first, this.prevLast = this.last, this.first = r, this.last = h, i
        },
        animate: function(e, i) {
            if (!this.locked && !this.animating) {
                this.animating = !0;
                var s = this,
                    n = function() {
                        if (s.animating = !1, 0 === e && s.list.css(s.lt, 0), !s.autoStopped && ("circular" == s.options.wrap || "both" == s.options.wrap || "last" == s.options.wrap || null === s.options.size || s.last < s.options.size || s.last == s.options.size && null !== s.tail && !s.inTail) && s.startAuto(), s.buttons(), s.notify("onAfterAnimation"), "circular" == s.options.wrap && null !== s.options.size)
                            for (var t = s.prevFirst; t <= s.prevLast; t++) null !== t && !(t >= s.first && t <= s.last) && (1 > t || t > s.options.size) && s.remove(t)
                    };
                if (this.notify("onBeforeAnimation"), this.options.animation && !1 !== i) {
                    var o = this.options.vertical ? {
                        top: e
                    } : this.options.rtl ? {
                        right: e
                    } : {
                        left: e
                    };
                    n = {
                        duration: this.options.animation,
                        easing: this.options.easing,
                        complete: n
                    };
                    t.isFunction(this.options.animationStepCallback) && (n.step = this.options.animationStepCallback), this.list.animate(o, n)
                } else this.list.css(this.lt, e + "px"), n()
            }
        },
        startAuto: function(t) {
            if (void 0 !== t && (this.options.auto = t), 0 === this.options.auto) return this.stopAuto();
            if (null === this.timer) {
                this.autoStopped = !1;
                var e = this;
                this.timer = window.setTimeout(function() {
                    e.next()
                }, 1e3 * this.options.auto)
            }
        },
        stopAuto: function() {
            this.pauseAuto(), this.autoStopped = !0
        },
        pauseAuto: function() {
            null !== this.timer && (window.clearTimeout(this.timer), this.timer = null)
        },
        buttons: function(t, e) {
            null != t || (t = !this.locked && 0 !== this.options.size && (this.options.wrap && "first" != this.options.wrap || null === this.options.size || this.last < this.options.size), this.locked || this.options.wrap && "first" != this.options.wrap || null === this.options.size || !(this.last >= this.options.size)) || (t = null !== this.tail && !this.inTail), null != e || (e = !this.locked && 0 !== this.options.size && (this.options.wrap && "last" != this.options.wrap || this.first > 1), this.locked || this.options.wrap && "last" != this.options.wrap || null === this.options.size || 1 != this.first) || (e = null !== this.tail && this.inTail);
            var i = this;
            this.buttonNext.size() > 0 ? (this.buttonNext.unbind(this.options.buttonNextEvent + ".jcarousel", this.funcNext), t && this.buttonNext.bind(this.options.buttonNextEvent + ".jcarousel", this.funcNext), this.buttonNext[t ? "removeClass" : "addClass"](this.className("jcarousel-next-disabled")).attr("disabled", !t), null !== this.options.buttonNextCallback && this.buttonNext.data("jcarouselstate") != t && this.buttonNext.each(function() {
                i.options.buttonNextCallback(i, this, t)
            }).data("jcarouselstate", t)) : null !== this.options.buttonNextCallback && this.buttonNextState != t && this.options.buttonNextCallback(i, null, t), this.buttonPrev.size() > 0 ? (this.buttonPrev.unbind(this.options.buttonPrevEvent + ".jcarousel", this.funcPrev), e && this.buttonPrev.bind(this.options.buttonPrevEvent + ".jcarousel", this.funcPrev), this.buttonPrev[e ? "removeClass" : "addClass"](this.className("jcarousel-prev-disabled")).attr("disabled", !e), null !== this.options.buttonPrevCallback && this.buttonPrev.data("jcarouselstate") != e && this.buttonPrev.each(function() {
                i.options.buttonPrevCallback(i, this, e)
            }).data("jcarouselstate", e)) : null !== this.options.buttonPrevCallback && this.buttonPrevState != e && this.options.buttonPrevCallback(i, null, e), this.buttonNextState = t, this.buttonPrevState = e
        },
        notify: function(t) {
            var e = null === this.prevFirst ? "init" : this.prevFirst < this.first ? "next" : "prev";
            this.callback("itemLoadCallback", t, e), this.prevFirst !== this.first && (this.callback("itemFirstInCallback", t, e, this.first), this.callback("itemFirstOutCallback", t, e, this.prevFirst)), this.prevLast !== this.last && (this.callback("itemLastInCallback", t, e, this.last), this.callback("itemLastOutCallback", t, e, this.prevLast)), this.callback("itemVisibleInCallback", t, e, this.first, this.last, this.prevFirst, this.prevLast), this.callback("itemVisibleOutCallback", t, e, this.prevFirst, this.prevLast, this.first, this.last)
        },
        callback: function(e, i, s, n, o, a, r) {
            if (null != this.options[e] && ("object" == typeof this.options[e] || "onAfterAnimation" == i)) {
                var l = "object" == typeof this.options[e] ? this.options[e][i] : this.options[e];
                if (t.isFunction(l)) {
                    var h = this;
                    if (void 0 === n) l(h, s, i);
                    else if (void 0 === o) this.get(n).each(function() {
                        l(h, this, n, s, i)
                    });
                    else {
                        e = function(t) {
                            h.get(t).each(function() {
                                l(h, this, t, s, i)
                            })
                        };
                        for (var c = n; o >= c; c++) null !== c && !(c >= a && r >= c) && e(c)
                    }
                }
            }
        },
        create: function(t) {
            return this.format("<li></li>", t)
        },
        format: function(e, i) {
            for (var s = (e = t(e)).get(0).className.split(" "), n = 0; n < s.length; n++) - 1 != s[n].indexOf("jcarousel-") && e.removeClass(s[n]);
            return e.addClass(this.className("jcarousel-item")).addClass(this.className("jcarousel-item-" + i)).css({
                float: this.options.rtl ? "right" : "left",
                "list-style": "none"
            }).attr("jcarouselindex", i), e
        },
        className: function(t) {
            return t + " " + t + (this.options.vertical ? "-vertical" : "-horizontal")
        },
        dimension: function(e, i) {
            var n = t(e);
            if (null == i) return this.options.vertical ? n.outerHeight(!0) || s.intval(this.options.itemFallbackDimension) : n.outerWidth(!0) || s.intval(this.options.itemFallbackDimension);
            var o = this.options.vertical ? i - s.intval(n.css("marginTop")) - s.intval(n.css("marginBottom")) : i - s.intval(n.css("marginLeft")) - s.intval(n.css("marginRight"));
            return t(n).css(this.wh, o + "px"), this.dimension(n)
        },
        clipping: function() {
            return this.options.vertical ? this.clip[0].offsetHeight - s.intval(this.clip.css("borderTopWidth")) - s.intval(this.clip.css("borderBottomWidth")) : this.clip[0].offsetWidth - s.intval(this.clip.css("borderLeftWidth")) - s.intval(this.clip.css("borderRightWidth"))
        },
        index: function(t, e) {
            return null == e && (e = this.options.size), Math.round(((t - 1) / e - Math.floor((t - 1) / e)) * e) + 1
        }
    }), s.extend({
        defaults: function(i) {
            return t.extend(e, i || {})
        },
        intval: function(t) {
            return t = parseInt(t, 10), isNaN(t) ? 0 : t
        },
        windowLoaded: function() {
            i = !0
        }
    }), t.fn.jcarousel = function(e) {
        if ("string" == typeof e) {
            var i = t(this).data("jcarousel"),
                n = Array.prototype.slice.call(arguments, 1);
            return i[e].apply(i, n)
        }
        return this.each(function() {
            var i = t(this).data("jcarousel");
            i ? (e && t.extend(i.options, e), i.reload()) : t(this).data("jcarousel", new s(this, e))
        })
    }
}(jQuery),
function(t, e) {
    var i = 0,
        s = Array.prototype.slice,
        n = t.cleanData;
    t.cleanData = function(e) {
        for (var i, s = 0; null != (i = e[s]); s++) try {
            t(i).triggerHandler("remove")
        } catch (t) {}
        n(e)
    }, t.widget = function(i, s, n) {
        var o, a, r, l, h = {},
            c = i.split(".")[0];
        i = i.split(".")[1], o = c + "-" + i, n || (n = s, s = t.Widget), t.expr[":"][o.toLowerCase()] = function(e) {
            return !!t.data(e, o)
        }, t[c] = t[c] || {}, a = t[c][i], r = t[c][i] = function(t, i) {
            return this._createWidget ? (arguments.length && this._createWidget(t, i), e) : new r(t, i)
        }, t.extend(r, a, {
            version: n.version,
            _proto: t.extend({}, n),
            _childConstructors: []
        }), (l = new s).options = t.widget.extend({}, l.options), t.each(n, function(i, n) {
            return t.isFunction(n) ? (h[i] = (o = function() {
                return s.prototype[i].apply(this, arguments)
            }, a = function(t) {
                return s.prototype[i].apply(this, t)
            }, function() {
                var t, e = this._super,
                    i = this._superApply;
                return this._super = o, this._superApply = a, t = n.apply(this, arguments), this._super = e, this._superApply = i, t
            }), e) : (h[i] = n, e);
            var o, a
        }), r.prototype = t.widget.extend(l, {
            widgetEventPrefix: a ? l.widgetEventPrefix : i
        }, h, {
            constructor: r,
            namespace: c,
            widgetName: i,
            widgetFullName: o
        }), a ? (t.each(a._childConstructors, function(e, i) {
            var s = i.prototype;
            t.widget(s.namespace + "." + s.widgetName, r, i._proto)
        }), delete a._childConstructors) : s._childConstructors.push(r), t.widget.bridge(i, r)
    }, t.widget.extend = function(i) {
        for (var n, o, a = s.call(arguments, 1), r = 0, l = a.length; l > r; r++)
            for (n in a[r]) o = a[r][n], a[r].hasOwnProperty(n) && o !== e && (i[n] = t.isPlainObject(o) ? t.isPlainObject(i[n]) ? t.widget.extend({}, i[n], o) : t.widget.extend({}, o) : o);
        return i
    }, t.widget.bridge = function(i, n) {
        var o = n.prototype.widgetFullName || i;
        t.fn[i] = function(a) {
            var r = "string" == typeof a,
                l = s.call(arguments, 1),
                h = this;
            return a = !r && l.length ? t.widget.extend.apply(null, [a].concat(l)) : a, r ? this.each(function() {
                var s, n = t.data(this, o);
                return n ? t.isFunction(n[a]) && "_" !== a.charAt(0) ? (s = n[a].apply(n, l)) !== n && s !== e ? (h = s && s.jquery ? h.pushStack(s.get()) : s, !1) : e : t.error("no such method '" + a + "' for " + i + " widget instance") : t.error("cannot call methods on " + i + " prior to initialization; attempted to call method '" + a + "'")
            }) : this.each(function() {
                var e = t.data(this, o);
                e ? e.option(a || {})._init() : t.data(this, o, new n(a, this))
            }), h
        }
    }, t.Widget = function() {}, t.Widget._childConstructors = [], t.Widget.prototype = {
        widgetName: "widget",
        widgetEventPrefix: "",
        defaultElement: "<div>",
        options: {
            disabled: !1,
            create: null
        },
        _createWidget: function(e, s) {
            s = t(s || this.defaultElement || this)[0], this.element = t(s), this.uuid = i++, this.eventNamespace = "." + this.widgetName + this.uuid, this.options = t.widget.extend({}, this.options, this._getCreateOptions(), e), this.bindings = t(), this.hoverable = t(), this.focusable = t(), s !== this && (t.data(s, this.widgetFullName, this), this._on(!0, this.element, {
                remove: function(t) {
                    t.target === s && this.destroy()
                }
            }), this.document = t(s.style ? s.ownerDocument : s.document || s), this.window = t(this.document[0].defaultView || this.document[0].parentWindow)), this._create(), this._trigger("create", null, this._getCreateEventData()), this._init()
        },
        _getCreateOptions: t.noop,
        _getCreateEventData: t.noop,
        _create: t.noop,
        _init: t.noop,
        destroy: function() {
            this._destroy(), this.element.unbind(this.eventNamespace).removeData(this.widgetName).removeData(this.widgetFullName).removeData(t.camelCase(this.widgetFullName)), this.widget().unbind(this.eventNamespace).removeAttr("aria-disabled").removeClass(this.widgetFullName + "-disabled ui-state-disabled"), this.bindings.unbind(this.eventNamespace), this.hoverable.removeClass("ui-state-hover"), this.focusable.removeClass("ui-state-focus")
        },
        _destroy: t.noop,
        widget: function() {
            return this.element
        },
        option: function(i, s) {
            var n, o, a, r = i;
            if (0 === arguments.length) return t.widget.extend({}, this.options);
            if ("string" == typeof i)
                if (r = {}, n = i.split("."), i = n.shift(), n.length) {
                    for (o = r[i] = t.widget.extend({}, this.options[i]), a = 0; n.length - 1 > a; a++) o[n[a]] = o[n[a]] || {}, o = o[n[a]];
                    if (i = n.pop(), s === e) return o[i] === e ? null : o[i];
                    o[i] = s
                } else {
                    if (s === e) return this.options[i] === e ? null : this.options[i];
                    r[i] = s
                }
            return this._setOptions(r), this
        },
        _setOptions: function(t) {
            var e;
            for (e in t) this._setOption(e, t[e]);
            return this
        },
        _setOption: function(t, e) {
            return this.options[t] = e, "disabled" === t && (this.widget().toggleClass(this.widgetFullName + "-disabled ui-state-disabled", !!e).attr("aria-disabled", e), this.hoverable.removeClass("ui-state-hover"), this.focusable.removeClass("ui-state-focus")), this
        },
        enable: function() {
            return this._setOption("disabled", !1)
        },
        disable: function() {
            return this._setOption("disabled", !0)
        },
        _on: function(i, s, n) {
            var o, a = this;
            "boolean" != typeof i && (n = s, s = i, i = !1), n ? (s = o = t(s), this.bindings = this.bindings.add(s)) : (n = s, s = this.element, o = this.widget()), t.each(n, function(n, r) {
                function l() {
                    return i || !0 !== a.options.disabled && !t(this).hasClass("ui-state-disabled") ? ("string" == typeof r ? a[r] : r).apply(a, arguments) : e
                }
                "string" != typeof r && (l.guid = r.guid = r.guid || l.guid || t.guid++);
                var h = n.match(/^(\w+)\s*(.*)$/),
                    c = h[1] + a.eventNamespace,
                    u = h[2];
                u ? o.delegate(u, c, l) : s.bind(c, l)
            })
        },
        _off: function(t, e) {
            e = (e || "").split(" ").join(this.eventNamespace + " ") + this.eventNamespace, t.unbind(e).undelegate(e)
        },
        _delay: function(t, e) {
            var i = this;
            return setTimeout(function() {
                return ("string" == typeof t ? i[t] : t).apply(i, arguments)
            }, e || 0)
        },
        _hoverable: function(e) {
            this.hoverable = this.hoverable.add(e), this._on(e, {
                mouseenter: function(e) {
                    t(e.currentTarget).addClass("ui-state-hover")
                },
                mouseleave: function(e) {
                    t(e.currentTarget).removeClass("ui-state-hover")
                }
            })
        },
        _focusable: function(e) {
            this.focusable = this.focusable.add(e), this._on(e, {
                focusin: function(e) {
                    t(e.currentTarget).addClass("ui-state-focus")
                },
                focusout: function(e) {
                    t(e.currentTarget).removeClass("ui-state-focus")
                }
            })
        },
        _trigger: function(e, i, s) {
            var n, o, a = this.options[e];
            if (s = s || {}, (i = t.Event(i)).type = (e === this.widgetEventPrefix ? e : this.widgetEventPrefix + e).toLowerCase(), i.target = this.element[0], o = i.originalEvent)
                for (n in o) n in i || (i[n] = o[n]);
            return this.element.trigger(i, s), !(t.isFunction(a) && !1 === a.apply(this.element[0], [i].concat(s)) || i.isDefaultPrevented())
        }
    }, t.each({
        show: "fadeIn",
        hide: "fadeOut"
    }, function(e, i) {
        t.Widget.prototype["_" + e] = function(s, n, o) {
            "string" == typeof n && (n = {
                effect: n
            });
            var a, r = n ? !0 === n || "number" == typeof n ? i : n.effect || i : e;
            "number" == typeof(n = n || {}) && (n = {
                duration: n
            }), a = !t.isEmptyObject(n), n.complete = o, n.delay && s.delay(n.delay), a && t.effects && t.effects.effect[r] ? s[e](n) : r !== e && s[r] ? s[r](n.duration, n.easing, o) : s.queue(function(i) {
                t(this)[e](), o && o.call(s[0]), i()
            })
        }
    })
}(jQuery),
function(t) {
    var e = 0,
        i = {},
        s = {};
    i.height = i.paddingTop = i.paddingBottom = i.borderTopWidth = i.borderBottomWidth = "hide", s.height = s.paddingTop = s.paddingBottom = s.borderTopWidth = s.borderBottomWidth = "show", t.widget("ui.accordion", {
        version: "1.10.3",
        options: {
            active: 0,
            animate: {},
            collapsible: !1,
            event: "click",
            header: "> li > :first-child,> :not(li):even",
            heightStyle: "auto",
            icons: {
                activeHeader: "ui-icon-triangle-1-s",
                header: "ui-icon-triangle-1-e"
            },
            activate: null,
            beforeActivate: null
        },
        _create: function() {
            var e = this.options;
            this.prevShow = this.prevHide = t(), this.element.addClass("ui-accordion ui-widget ui-helper-reset").attr("role", "tablist"), e.collapsible || !1 !== e.active && null != e.active || (e.active = 0), this._processPanels(), 0 > e.active && (e.active += this.headers.length), this._refresh()
        },
        _getCreateEventData: function() {
            return {
                header: this.active,
                panel: this.active.length ? this.active.next() : t(),
                content: this.active.length ? this.active.next() : t()
            }
        },
        _createIcons: function() {
            var e = this.options.icons;
            e && (t("<span>").addClass("ui-accordion-header-icon ui-icon " + e.header).prependTo(this.headers), this.active.children(".ui-accordion-header-icon").removeClass(e.header).addClass(e.activeHeader), this.headers.addClass("ui-accordion-icons"))
        },
        _destroyIcons: function() {
            this.headers.removeClass("ui-accordion-icons").children(".ui-accordion-header-icon").remove()
        },
        _destroy: function() {
            var t;
            this.element.removeClass("ui-accordion ui-widget ui-helper-reset").removeAttr("role"), this.headers.removeClass("ui-accordion-header ui-accordion-header-active ui-helper-reset ui-state-default ui-corner-all ui-state-active ui-state-disabled ui-corner-top").removeAttr("role").removeAttr("aria-selected").removeAttr("aria-controls").removeAttr("tabIndex").each(function() {
                /^ui-accordion/.test(this.id) && this.removeAttribute("id")
            }), this._destroyIcons(), t = this.headers.next().css("display", "").removeAttr("role").removeAttr("aria-expanded").removeAttr("aria-hidden").removeAttr("aria-labelledby").removeClass("ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content ui-accordion-content-active ui-state-disabled").each(function() {
                /^ui-accordion/.test(this.id) && this.removeAttribute("id")
            }), "content" !== this.options.heightStyle && t.css("height", "")
        },
        _setOption: function(t, e) {
            return "active" === t ? void this._activate(e) : ("event" === t && (this.options.event && this._off(this.headers, this.options.event), this._setupEvents(e)), this._super(t, e), "collapsible" !== t || e || !1 !== this.options.active || this._activate(0), "icons" === t && (this._destroyIcons(), e && this._createIcons()), void("disabled" === t && this.headers.add(this.headers.next()).toggleClass("ui-state-disabled", !!e)))
        },
        _keydown: function(e) {
            if (!e.altKey && !e.ctrlKey) {
                var i = t.ui.keyCode,
                    s = this.headers.length,
                    n = this.headers.index(e.target),
                    o = !1;
                switch (e.keyCode) {
                    case i.RIGHT:
                    case i.DOWN:
                        o = this.headers[(n + 1) % s];
                        break;
                    case i.LEFT:
                    case i.UP:
                        o = this.headers[(n - 1 + s) % s];
                        break;
                    case i.SPACE:
                    case i.ENTER:
                        this._eventHandler(e);
                        break;
                    case i.HOME:
                        o = this.headers[0];
                        break;
                    case i.END:
                        o = this.headers[s - 1]
                }
                o && (t(e.target).attr("tabIndex", -1), t(o).attr("tabIndex", 0), o.focus(), e.preventDefault())
            }
        },
        _panelKeyDown: function(e) {
            e.keyCode === t.ui.keyCode.UP && e.ctrlKey && t(e.currentTarget).prev().focus()
        },
        refresh: function() {
            var e = this.options;
            this._processPanels(), !1 === e.active && !0 === e.collapsible || !this.headers.length ? (e.active = !1, this.active = t()) : !1 === e.active ? this._activate(0) : this.active.length && !t.contains(this.element[0], this.active[0]) ? this.headers.length === this.headers.find(".ui-state-disabled").length ? (e.active = !1, this.active = t()) : this._activate(Math.max(0, e.active - 1)) : e.active = this.headers.index(this.active), this._destroyIcons(), this._refresh()
        },
        _processPanels: function() {
            this.headers = this.element.find(this.options.header).addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-all"), this.headers.next().addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").filter(":not(.ui-accordion-content-active)").hide()
        },
        _refresh: function() {
            var i, s = this.options,
                n = s.heightStyle,
                o = this.element.parent(),
                a = this.accordionId = "ui-accordion-" + (this.element.attr("id") || ++e);
            this.active = this._findActive(s.active).addClass("ui-accordion-header-active ui-state-active ui-corner-top").removeClass("ui-corner-all"), this.active.next().addClass("ui-accordion-content-active").show(), this.headers.attr("role", "tab").each(function(e) {
                var i = t(this),
                    s = i.attr("id"),
                    n = i.next(),
                    o = n.attr("id");
                s || (s = a + "-header-" + e, i.attr("id", s)), o || (o = a + "-panel-" + e, n.attr("id", o)), i.attr("aria-controls", o), n.attr("aria-labelledby", s)
            }).next().attr("role", "tabpanel"), this.headers.not(this.active).attr({
                "aria-selected": "false",
                tabIndex: -1
            }).next().attr({
                "aria-expanded": "false",
                "aria-hidden": "true"
            }).hide(), this.active.length ? this.active.attr({
                "aria-selected": "true",
                tabIndex: 0
            }).next().attr({
                "aria-expanded": "true",
                "aria-hidden": "false"
            }) : this.headers.eq(0).attr("tabIndex", 0), this._createIcons(), this._setupEvents(s.event), "fill" === n ? (i = o.height(), this.element.siblings(":visible").each(function() {
                var e = t(this),
                    s = e.css("position");
                "absolute" !== s && "fixed" !== s && (i -= e.outerHeight(!0))
            }), this.headers.each(function() {
                i -= t(this).outerHeight(!0)
            }), this.headers.next().each(function() {
                t(this).height(Math.max(0, i - t(this).innerHeight() + t(this).height()))
            }).css("overflow", "auto")) : "auto" === n && (i = 0, this.headers.next().each(function() {
                i = Math.max(i, t(this).css("height", "").height())
            }).height(i))
        },
        _activate: function(e) {
            var i = this._findActive(e)[0];
            i !== this.active[0] && (i = i || this.active[0], this._eventHandler({
                target: i,
                currentTarget: i,
                preventDefault: t.noop
            }))
        },
        _findActive: function(e) {
            return "number" == typeof e ? this.headers.eq(e) : t()
        },
        _setupEvents: function(e) {
            var i = {
                keydown: "_keydown"
            };
            e && t.each(e.split(" "), function(t, e) {
                i[e] = "_eventHandler"
            }), this._off(this.headers.add(this.headers.next())), this._on(this.headers, i), this._on(this.headers.next(), {
                keydown: "_panelKeyDown"
            }), this._hoverable(this.headers), this._focusable(this.headers)
        },
        _eventHandler: function(e) {
            var i = this.options,
                s = this.active,
                n = t(e.currentTarget),
                o = n[0] === s[0],
                a = o && i.collapsible,
                r = a ? t() : n.next(),
                l = {
                    oldHeader: s,
                    oldPanel: s.next(),
                    newHeader: a ? t() : n,
                    newPanel: r
                };
            e.preventDefault(), o && !i.collapsible || !1 === this._trigger("beforeActivate", e, l) || (i.active = !a && this.headers.index(n), this.active = o ? t() : n, this._toggle(l), s.removeClass("ui-accordion-header-active ui-state-active"), i.icons && s.children(".ui-accordion-header-icon").removeClass(i.icons.activeHeader).addClass(i.icons.header), o || (n.removeClass("ui-corner-all").addClass("ui-accordion-header-active ui-state-active ui-corner-top"), i.icons && n.children(".ui-accordion-header-icon").removeClass(i.icons.header).addClass(i.icons.activeHeader), n.next().addClass("ui-accordion-content-active")))
        },
        _toggle: function(e) {
            var i = e.newPanel,
                s = this.prevShow.length ? this.prevShow : e.oldPanel;
            this.prevShow.add(this.prevHide).stop(!0, !0), this.prevShow = i, this.prevHide = s, this.options.animate ? this._animate(i, s, e) : (s.hide(), i.show(), this._toggleComplete(e)), s.attr({
                "aria-expanded": "false",
                "aria-hidden": "true"
            }), s.prev().attr("aria-selected", "false"), i.length && s.length ? s.prev().attr("tabIndex", -1) : i.length && this.headers.filter(function() {
                return 0 === t(this).attr("tabIndex")
            }).attr("tabIndex", -1), i.attr({
                "aria-expanded": "true",
                "aria-hidden": "false"
            }).prev().attr({
                "aria-selected": "true",
                tabIndex: 0
            })
        },
        _animate: function(t, e, n) {
            var o, a, r, l = this,
                h = 0,
                c = t.length && (!e.length || t.index() < e.index()),
                u = this.options.animate || {},
                d = c && u.down || u,
                p = function() {
                    l._toggleComplete(n)
                };
            return "number" == typeof d && (r = d), "string" == typeof d && (a = d), a = a || d.easing || u.easing, r = r || d.duration || u.duration, e.length ? t.length ? (o = t.show().outerHeight(), e.animate(i, {
                duration: r,
                easing: a,
                step: function(t, e) {
                    e.now = Math.round(t)
                }
            }), void t.hide().animate(s, {
                duration: r,
                easing: a,
                complete: p,
                step: function(t, i) {
                    i.now = Math.round(t), "height" !== i.prop ? h += i.now : "content" !== l.options.heightStyle && (i.now = Math.round(o - e.outerHeight() - h), h = 0)
                }
            })) : e.animate(i, r, a, p) : t.animate(s, r, a, p)
        },
        _toggleComplete: function(t) {
            var e = t.oldPanel;
            e.removeClass("ui-accordion-content-active").prev().removeClass("ui-corner-top").addClass("ui-corner-all"), e.length && (e.parent()[0].className = e.parent()[0].className), this._trigger("activate", null, t)
        }
    })
}(jQuery),
function(t, e) {
    t.widget("ui.progressbar", {
        version: "1.10.3",
        options: {
            max: 100,
            value: 0,
            change: null,
            complete: null
        },
        min: 0,
        _create: function() {
            this.oldValue = this.options.value = this._constrainedValue(), this.element.addClass("ui-progressbar ui-widget ui-widget-content ui-corner-all").attr({
                role: "progressbar",
                "aria-valuemin": this.min
            }), this.valueDiv = t("<div class='ui-progressbar-value ui-widget-header ui-corner-left'></div>").appendTo(this.element), this._refreshValue()
        },
        _destroy: function() {
            this.element.removeClass("ui-progressbar ui-widget ui-widget-content ui-corner-all").removeAttr("role").removeAttr("aria-valuemin").removeAttr("aria-valuemax").removeAttr("aria-valuenow"), this.valueDiv.remove()
        },
        value: function(t) {
            return t === e ? this.options.value : (this.options.value = this._constrainedValue(t), this._refreshValue(), e)
        },
        _constrainedValue: function(t) {
            return t === e && (t = this.options.value), this.indeterminate = !1 === t, "number" != typeof t && (t = 0), !this.indeterminate && Math.min(this.options.max, Math.max(this.min, t))
        },
        _setOptions: function(t) {
            var e = t.value;
            delete t.value, this._super(t), this.options.value = this._constrainedValue(e), this._refreshValue()
        },
        _setOption: function(t, e) {
            "max" === t && (e = Math.max(this.min, e)), this._super(t, e)
        },
        _percentage: function() {
            return this.indeterminate ? 100 : 100 * (this.options.value - this.min) / (this.options.max - this.min)
        },
        _refreshValue: function() {
            var e = this.options.value,
                i = this._percentage();
            this.valueDiv.toggle(this.indeterminate || e > this.min).toggleClass("ui-corner-right", e === this.options.max).width(i.toFixed(0) + "%"), this.element.toggleClass("ui-progressbar-indeterminate", this.indeterminate), this.indeterminate ? (this.element.removeAttr("aria-valuenow"), this.overlayDiv || (this.overlayDiv = t("<div class='ui-progressbar-overlay'></div>").appendTo(this.valueDiv))) : (this.element.attr({
                "aria-valuemax": this.options.max,
                "aria-valuenow": e
            }), this.overlayDiv && (this.overlayDiv.remove(), this.overlayDiv = null)), this.oldValue !== e && (this.oldValue = e, this._trigger("change")), e === this.options.max && this._trigger("complete")
        }
    })
}(jQuery);