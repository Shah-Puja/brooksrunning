var BF = BF || function() {
    function a(a, b) {
        g[a] = b
    }

    function b(a, b) {
        var c = new i(a);
        g[a].call(c, c, b)
    }

    function c(a) {
        for (var c in g) {
            var d = "data-bf-" + c,
                e = "[" + d + "]",
                f = a.querySelectorAll(e);
            try {
                for (var h = 0; h < f.length; h++) b(c, f[h]);
                a.hasAttribute(d) && b(c, a)
            } catch (b) {
                console.error("Brooks Finder ERROR\n", "Location: compnent " + c + "\n", 'Error: "' + b + '"'), console.error(a)
            }
        }
    }

    function d(a, b) {
        var c = new i(a);
        h[a] = b.call(c, c)
    }

    function e() {
        var a = document.querySelector("[data-bf-app]");
        null !== a && c(a), f.emit(BF.events.START)
    }
    var f = new window.TinyEmitter,
        g = {},
        h = {},
        i = function(a) {
            var b = {};
            return b.on = function(a, c) {
                f.on(a, function(a) {
                    c.call(b, a)
                })
            }, b.emit = function(a, b) {
                f.emit(a, b)
            }, b.init = function(a) {
                setTimeout(function() {
                    a.call(b)
                })
            }, b.start = function(a) {
                f.on(BF.events.START, function() {
                    a.call(b)
                })
            }, b.error = function(b) {
                console.error("Brooks Finder ERROR\n", "Location: " + a + "\n", 'Error: "' + b + '"')
            }, b
        };
    return {
        start: e,
        component: a,
        service: d,
        services: h,
        compile: c
    }
}();
BF.events = {
    START: "START",
    SET_FORM_VALUES: "SET_FORM_VALUES",
    SCREEN_TRANSITION_START: "SCREEN_TRANSITION_START",
    SCREEN_TRANSITION_ACTIVE: "SCREEN_TRANSITION_ACTIVE",
    SCREEN_TRANSITION_END: "SCREEN_TRANSTION_END",
    WINDOW_RESIZE: "WINDOW_RESIZE",
    USER_SCROLL: "USER_SCROLL",
    OPEN_INFO_OVERLAY: "OPEN_INFO_OVERLAY",
    CLOSE_INFO_OVERLAY: "CLOSE_INFO_OVERLAY",
    OPEN_ALERT: "OPEN_ALERT",
    CLOSE_ALERT: "CLOSE_ALERT",
    OPEN_PROGRESS_MENU: "OPEN_PROGRESS_MENU",
    CLOSE_PROGRESS_MENU: "CLOSE_PROGRESS_MENU",
    SHOW_PROGRESS_MENU: "SHOW_PROGRESS_MENU",
    HIDE_PROGRESS_MENU: "HIDE_PROGRESS_MENU",
    HIDE_SCREENS: "HIDE_SCREENS",
    SHOW_SCREENS: "SHOW_SCREENS",
    LOADING_SCREEN_DATA: "LOADING_SCREEN_DATA",
    SCREEN_DATA_LOADED: "SCREEN_DATA_LOADED"
}, BF.helpers = {
    prefixedCssObject: function(a) {
        var b = ["webkit", "ms", "moz"],
            c = {};
        for (var d in a) c[d] = a[d], b.map(function(b) {
            c["-" + b + "-" + d] = a[d]
        });
        return c
    },
    isFormScreen: function(a) {
        return "form" === a.type
    },
    isIE: function() {
        return -1 !== navigator.userAgent.indexOf("MSIE") || navigator.appVersion.indexOf("Trident/") > 0
    }
}, BF.service("analytics", function(a) {
    function b(a, b, c) {}
    return {
        event: b
    }
}), BF.service("api", function(a) {
    return {
        call: function(a, b) {
            return new Promise(function(c, d) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: a,
                    type: b,
                    data: BF.services.form.formValues(),
                    success: function(a) {
                            c(a)
                            getscore()
                    },
                    error: function() {
                        d("There was an error. Please try again")
                    }
                })
            })
        }
    }
}), BF.service("device", function(a) {
    return a.props = {
        slowConnectionThreshold: 2e3
    }, a.state = {
        hasTouch: function() {
            var a = " -webkit- -moz- -o- -ms- ".split(" ");
            if ("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch) return !0;
            var b = ["(", a.join("touch-enabled),("), "heartz", ")"].join("");
            return function(a) {
                return window.matchMedia(a).matches
            }(b)
        }(),
        hasSlowConnection: function() {
            return !(!window.performance || !window.performance.timing) && window.performance.timing.responseStart - window.performance.timing.requestStart > a.props.slowConnectionThreshold
        }()
    }, {
        hasTouch: a.state.hasTouch,
        hasSlowConnection: a.state.hasSlowConnection
    }
}), BF.service("form", function(a) {
    function b() {
        return $(a.els.form).serializeArray()
    }

    function c() {
        a.state.formValues = b(), a.emit(BF.events.SET_FORM_VALUES, a.state.formValues)
    }

    function d() {
        $(a.els.form).find("input:text, input:password, input:file, select, textarea").val(""), $(a.els.form).find("input:radio, input:checkbox").removeAttr("checked").removeAttr("selected"), $(a.els.form).find("input:radio, input:checkbox").each(function() {
            this.checked = !1
        }), c()
    }

    function e(b) {
        return !!a.state.formValues.filter(function(a) {
            return a.name == b
        }).length
    }

    function f(a) {
        if (!a) return !1;
        var b = !0;
        return a.requiredFields.map(function(a) {
            b = b ? e(a) : b
        }), b
    }

    function g(a) {
        return f(k(a))
    }

    function h(b) {
        return f(a.state.formSteps[b])
    }

    function i() {
        return a.state.formSteps.filter(f)
    }

    function j() {
        return a.state.formSteps.filter(f).length === a.state.formSteps.length
    }

    function k(b) {
        return a.state.formSteps.filter(function(a) {
            return a.id === b
        })[0]
    }
    return a.state = {
        formValues: [],
        formSteps: [],
        sendProgressHandler: null
    }, a.els = {
        form: document.querySelector('form[name="bf-form"]')
    }, a.els.form ? (a.els.form.addEventListener("submit", function(a) {
        a.preventDefault()
    }), a.start(function() {
        c()
    }), {
        registerFormStep: function(b) {
            a.state.formSteps.push(b)
        },
        updateFormValues: function() {
            setTimeout(function() {
                c()
            })
        },
        sendFormProgress: function() {
            clearTimeout(a.state.sendProgressHandler), a.state.sendProgressHandler = setTimeout(function() {
                BF.services.api.call(BF.endpoints.sendProgress.url, BF.endpoints.sendProgress.type)
            }, 500)
        },
        formValues: function() {
            return a.state.formValues
        },
        inputValueString: function(b) {
            var c = a.state.formValues.filter(function(a) {
                return a.name == b
            });
            if (!c.length || 0 === c.filter(function(a) {
                    return a.value.length > 0
                }).length) return "";
            var d = "";
            return c.map(function(a, b) {
                d += (b > 0 ? "," : "") + a.value
            }), d
        },
        allStepsCompleted: function() {
            return i().length === a.state.formSteps.length
        },
        completedSteps: i,
        completedById: g,
        completedByIndex: h,
        reset: d,
        formIsComplete: j
    }) : a.error("Form not found")
}), BF.service("history", function(a) {
    function b(b) {
        if (!a.state.initialized) return a.state.initialized = !0, history.replaceState({
            id: b.active.id
        }, b.active.id, "");
        a.state.navigatingByPopstate || history.pushState({
            id: b.active.id
        }, null, null), a.state.initialized = !0, a.state.navigatingByPopstate = !1
    }
    a.state = {
        initialized: !1,
        navigatingByPopstate: !1
    }, window.addEventListener("popstate", function(b) {
        b.state && b.state.id && (a.state.navigatingByPopstate = !0, BF.services.screens.changeScreen(b.state.id))
    }), a.on(BF.events.SCREEN_TRANSITION_START, b)
}), BF.service("screens", function(a) {
    function b() {
        return a.state.screens.length ? BF.services.form.allStepsCompleted() ? d(a.state.screens[a.state.screens.length - 1].id) : void d(a.state.screens[0].id) : setTimeout(function() {
            b()
        }, 50)
    }

    function c(b) {
        var e = null,
            f = null,
            h = g(a.state.activeScreenId),
            k = a.state.screens[b];
        if (b >= a.state.screens.length - 1) return d(a.state.screens[a.state.screens.length - 1].id);
        if (a.state.screens[b]) {
            if (BF.helpers.isFormScreen(k) && j(k.id)) return c(b + 1);
            for (var l = 0; l < a.state.screens.length; l++)
                if (BF.helpers.isFormScreen(a.state.screens[l])) {
                    if (l < b && !j(a.state.screens[l].id)) return d(a.state.screens[l].id);
                    l > b && j(a.state.screens[l].id) ? e = null === e ? l : e : j(a.state.screens[l].id) || (f = null === f ? l : f)
                }
            var m = null;
            if (null !== h) {
                for (var l = 0; l < b; l++) m && a.state.screens[l].type == m.type && (m = null), a.state.screens[l].hasPriority && l > g(a.state.activeScreenId) && (m = a.state.screens[l]);
                if (m)
                    for (var l = g(m.id); l <= b; l++)
                        if (BF.helpers.isFormScreen(a.state.screens[l]) && !j(a.state.screens[l].id)) return d(m.id)
            }
            if (BF.helpers.isFormScreen(k) && !j(k.id)) return d(k.id);
            if (null === f) {
                var n = g(i("form").pop().id);
                return b > n ? d(k.id) : c(n + 1)
            }
            if (null !== e) return c(e + 1);
            d(k.id)
        }
    }

    function d(b) {
        if (b && a.state.activeScreenId != b && !a.state.transitionInProgress && !a.state.loadingDependency) {
            var c = f(b);
            if (!c.dependency) return e(b);
            a.state.loadingDependency = !0, a.emit(BF.events.LOADING_SCREEN_DATA, c.id), c.dependency().then(function(b) {
                a.state.loadingDependency = !1, a.emit(BF.events.SCREEN_DATA_LOADED, {
                    id: c.id,
                    data: b
                }), setTimeout(function() {
                    e(c.id)
                })
            }).catch(function(b) {
                alert(b), a.state.loadingDependency = !1
            })
        }
    }

    function e(b) {
        var c, d, e;
        a.state.transitionInProgress = !0, a.state.previousScreenId = a.state.activeScreenId, a.state.activeScreenId = b, c = f(a.state.activeScreenId), d = f(a.state.previousScreenId);
        var e = {
            active: c,
            previous: d,
            reverse: !!d && g(c.id) < g(d.id)
        };
        a.emit(BF.events.SCREEN_TRANSITION_START, e), setTimeout(function() {
            window.requestAnimationFrame(function() {
                a.emit(BF.events.SCREEN_TRANSITION_ACTIVE, e), setTimeout(function() {
                    window.scrollTo(0, 0)
                }, 750), setTimeout(function() {
                    if (a.emit(BF.events.SCREEN_TRANSITION_END, e), a.state.transitionInProgress = !1, void 0 !== window.CustomEvent) {
                        var b = new CustomEvent("shoeFinderScreenChange", {
                                bubbles: !0,
                                cancelable: !0,
                                detail: {
                                    previous: e.previous ? e.previous.id : null,
                                    active: e.active.id
                                }
                            }),
                            c = window.document.querySelector('[data-bf-screen][data-id="' + e.active.id + '"]');
                        c && c.dispatchEvent(b)
                    }
                }, a.props.transitionLength)
            })
        }, 50)
    }

    function f(b) {
        return b ? a.state.screens.filter(function(a) {
            return a.id === b
        })[0] : null
    }

    function g(b) {
        var c = null;
        return a.state.screens.map(function(a, d) {
            a.id === b && (c = d)
        }), c
    }

    function h() {
        return g(a.state.activeScreenId)
    }

    function i(b) {
        return a.state.screens.filter(function(a) {
            return a.type === b
        })
    }

    function j(a) {
        return BF.services.form.completedById(a)
    }

    function k(b) {
        return g(a.state.activeScreenId) - g(b)
    }

    function l(b, c) {
        if (!b) return 0;
        for (var d = 0, e = 0; e < a.state.screens.length && a.state.screens[e].id !== b; e++) a.state.screens[e].type === c && d++;
        return d
    }
    return a.props = {
        transitionLength: 2e3
    }, a.state = {
        initialized: !1,
        transitionInProgress: !1,
        loadingDependency: !1,
        activeScreenId: null,
        previousScreenId: null,
        screens: []
    }, a.init(function() {
        setTimeout(b, 100)
    }), {
        registerScreen: function(b) {
            a.state.screens.push({
                id: b.id,
                type: b.type,
                hasPriority: b.hasPriority,
                dependency: b.dependency && "function" == typeof b.dependency ? b.dependency : null
            })
        },
        nextScreen: function() {
            setTimeout(function() {
                c(null === a.state.activeScreenId ? 0 : h() + 1)
            })
        },
        changeScreen: d,
        requestScreenChange: c,
        activeScreen: function() {
            return f(a.state.activeScreenId)
        },
        activeScreenId: function() {
            return a.state.activeScreenId
        },
        previousScreenId: function() {
            return a.state.previousScreenId
        },
        screens: function() {
            return a.state.screens
        },
        screensByType: i,
        relativeScreenIndex: k,
        formScreenIndexById: function(a) {
            return l(a, "form")
        },
        screenIndexById: function(a) {
            return g(a)
        },
        activeFormScreenIndex: function() {
            return l(a.state.activeScreenId, "form")
        }
    }
}), BF.service("scroll", function(a) {
    function b() {
        a.state.scrollPosition = a.els.$scrollContainer.scrollTop(), a.emit(BF.events.USER_SCROLL, {
            y: a.state.scrollPosition
        })
    }

    function c() {
        var a = document.createElement("div");
        a.style.visibility = "hidden", a.style.width = "100px", a.style.msOverflowStyle = "scrollbar", document.body.appendChild(a);
        var b = a.offsetWidth;
        a.style.overflow = "scroll";
        var c = document.createElement("div");
        c.style.width = "100%", a.appendChild(c);
        var d = c.offsetWidth;
        return a.parentNode.removeChild(a), b - d
    }
    return a.state = {
        scrollPosition: 0,
        scrollbarWidth: 0
    }, a.els = {
        $scrollContainer: $(window)
    }, a.els.$scrollContainer.on("scroll", function() {
        b()
    }), setTimeout(function() {
        a.state.scrollbarWidth = c()
    }, 100), {
        scrollbarWidth: function() {
            return a.state.scrollbarWidth
        },
        position: function() {
            return a.state.scrollPosition
        }
    }
}), BF.service("window", function(a) {
    function b() {
        e || (e = setTimeout(function() {
            e = null, c()
        }, a.props.resizeTimeoutDuration))
    }

    function c() {
        d(), a.emit(BF.events.WINDOW_RESIZE, {
            width: a.state.width,
            height: a.state.height
        })
    }

    function d() {
        a.state.width = isNaN(window.innerWidth) ? window.clientWidth : window.innerWidth, a.state.height = isNaN(window.innerHeight) ? window.clientHeight : window.innerHeight
    }
    a.props = {
        resizeTimeoutDuration: 60
    }, a.state = {
        width: 0,
        height: 0
    };
    var e;
    return window.addEventListener("resize", b), setTimeout(function() {
        d()
    }, 100), {
        width: function() {
            return a.state.width
        },
        height: function() {
            return a.state.height
        }
    }
}), BF.component("alert", function(a, b) {
    function c(c) {
        var d = document.getElementById(c);
        if (!d) return a.error("Info overlay content not found");
        a.els.content.innerHTML = d.innerHTML, BF.compile(a.els.content), document.addEventListener("keydown", e), b.style.display = "", b.setAttribute("aria-hidden", "false"), setTimeout(function() {
            window.requestAnimationFrame(function() {
                b.classList.add(a.props.activeClass)
            })
        }, 50), setTimeout(function() {
            a.els.content.focus()
        }, 250)
    }

    function d() {
        window.requestAnimationFrame(function() {
            b.classList.remove(a.props.activeClass)
        }), document.removeEventListener("keydown", e), setTimeout(function() {
            b.style.display = "none", b.setAttribute("aria-hidden", "true")
        }, 500)
    }

    function e(b) {
        "Escape" === b.key && a.emit(BF.events.CLOSE_ALERT)
    }
    if (a.props = {
            activeClass: "bf-info-overlay--open"
        }, a.els = {
            content: b.querySelector("[data-content]"),
            button: b.querySelector("[data-button]")
        }, !a.els.content) return a.error("Content element not found");
    b.style.display = "none", b.setAttribute("aria-hidden", "true"), a.on(BF.events.SCREEN_TRANSITION_START, d), a.on(BF.events.OPEN_ALERT, c), a.on(BF.events.CLOSE_ALERT, d)
}), BF.component("alert-link", function(a, b) {
    function c() {
        a.emit(BF.events.OPEN_ALERT, a.props.templateId), a.state.active = !0
    }

    function d() {
        b.classList.add(a.props.selectedClass)
    }

    function e() {
        b.classList.remove(a.props.selectedClass), a.state.active = !1
    }

    function f() {
        d(), c()
    }

    function g() {
        a.state.active && (e(), h())
    }

    function h() {
        var b = document.querySelector("input#" + a.props.inputId);
        b && (b.checked = !1, BF.services.form.updateFormValues())
    }
    a.props = {
        selectedClass: "active",
        templateId: b.getAttribute("data-template-id"),
        inputId: b.getAttribute("data-input-id")
    }, a.state = {
        active: !1
    }, a.on(BF.events.CLOSE_ALERT, g), a.on(BF.events.SCREEN_TRANSITION_END, e), b.addEventListener("click", f)
}), BF.component("aria-progress", function(a, b) {
    function c(a) {
        d(), b.setAttribute("aria-valuenow", e())
    }

    function d() {
        b.setAttribute("aria-valuemax", f())
    }

    function e() {
        return BF.services.form.completedSteps().length
    }

    function f() {
        return BF.services.screens.screensByType("form").length
    }
    a.on(BF.events.SCREEN_TRANSITION_END, c)
}), BF.component("behind-the-science-link", function(a, b) {
    if (!document.getElementById("BehindTheScienceLink")) return a.error("Behind the science link template not found");
    a.props = {
        template: document.getElementById("BehindTheScienceLink").innerHTML,
        templateId: b.getAttribute("data-template-id"),
        screenTitle: b.hasAttribute("data-screen-title") ? b.getAttribute("data-screen-title") : void 0
    }, a.init(function() {
        var c = a.props.template.replace("data-template-id", 'data-template-id="' + a.props.templateId + '"');
        c = a.props.screenTitle ? c.replace("data-screen-title", 'data-screen-title="' + a.props.screenTitle + '"') : c, c = $(c)[0], $(b).html(c), BF.compile(c)
    })
}), BF.component("button", function(a, b) {
    a.props = {
        preventDefault: b.hasAttribute("data-prevent-default")
    }, b.addEventListener("keypress", function(c) {
        32 != c.keyCode && 13 != c.keyCode || (b.click(), a.props.preventDefault && c.preventDefault())
    })
}), BF.component("carousel", function(a, b) {
    function c() {
        a.state.initiated || (a.state.initiated = !0, a.els.thumbnailContainer.innerHTML = a.els.container.innerHTML, $(a.els.container).slick({
            dots: !0,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: !1
        }), d().each(function() {
            this.addEventListener("click", function() {
                $(a.els.container).slick("slickGoTo", $(this).index())
            })
        }), $(a.els.container).on("beforeChange", function(b, c, e, f) {
            d().removeClass(a.props.selectedThumbnailClass), d()[f].classList.add(a.props.selectedThumbnailClass)
        }), d().length ? d()[0].classList.add(a.props.selectedThumbnailClass) : console.log("No thumbnails found..."))
    }

    function d() {
        return $(a.els.thumbnailContainer).children()
    }
    a.props = {
        selectedThumbnailClass: "selected"
    }, a.state = {
        initiated: !1
    }, a.els = {
        container: b.querySelector("[data-items]"),
        thumbnailContainer: b.querySelector("[data-thumbnails]")
    }, a.on(BF.events.SCREEN_TRANSITION_ACTIVE, c), a.on(BF.events.SCREEN_TRANSITION_END, function() {
        $(a.els.container).slick("setPosition")
    })
}), BF.component("change-screen-link", function(a, b) {
    function c(b) {
        b.preventDefault(), BF.services.screens.changeScreen(a.props.id)
    }
    if (a.props = {
            id: b.getAttribute("data-id")
        }, !a.props.id) return a.error("Screen Id not specified");
    b.addEventListener("click", c)
}), BF.component("checkpoint-header", function(a, b) {
    function c() {
        setTimeout(function() {
            $(a.els.bar).css(BF.helpers.prefixedCssObject({
                transform: "scaleX(" + f() / g() + ")"
            }))
        }, a.props.barTimeout)
    }

    function d(b) {
        "checkpoint" === b.active.type && $(a.els.bar).css(BF.helpers.prefixedCssObject({
            transform: "scaleX(0)"
        }))
    }

    function e(d) {
        if ("checkpoint" === d.active.type) return b.classList.add(a.props.activeClass), void c();
        b.classList.remove(a.props.activeClass)
    }

    function f() {
        return BF.services.screens.formScreenIndexById(BF.services.screens.activeScreenId())
    }

    function g() {
        return BF.services.screens.screensByType("form").length
    }
    a.props = {
        activeClass: "bf-checkpoint-header--active",
        barTimeout: 500
    }, a.els = {
        bar: b.querySelector("[data-bar]")
    }, a.on(BF.events.SCREEN_TRANSITION_ACTIVE, e), a.on(BF.events.SCREEN_TRANSITION_START, d)
}), BF.component("city-trail", function(a, b) {
    function c() {
        a.els.cityMask = $(a.els.container.querySelector("#CityMask rect")), a.els.trailMask = $(a.els.container.querySelector("#TrailMask rect")), a.els.line = $(a.els.container.querySelector("#Line line"))
    }

    function d(c) {
        if ("Terrain" == c.active.id && a.state.loaded && j(), k(c.active) && !k(c.previous)) return void b.classList.add(a.props.enteringClass);
        !k(c.active) && k(c.previous) && (b.classList.remove(a.props.activeClass), b.classList.add(a.props.leavingClass))
    }

    function e(c) {
        if ($(b).removeClass([a.props.enteringClass, a.props.leavingClass].join(" ")), k(c.active) && !k(c.previous)) return void b.classList.add(a.props.enterActiveClass, a.props.activeClass);
        !k(c.active) && k(c.previous) && (c.reverse ? b.classList.add(a.props.leaveActiveReverseClass) : b.classList.add(a.props.leaveActiveClass))
    }

    function f(c) {
        $(b).removeClass([a.props.activeClass, a.props.enterActiveClass, a.props.leaveActiveClass, a.props.leaveActiveReverseClass].join(" ")), k(c.active) && b.classList.add(a.props.activeClass)
    }

    function g() {
        if (a.state.loaded && a.els.cityMask && a.els.trailMask && a.els.line) {
            var b = BF.services.form.formValues().filter(function(b) {
                return b.name == a.props.terrainInputName
            });
            return b.length && b[0].value === a.props.roadInputValue ? i() : b.length && b[0].value === a.props.trailInputValue ? h() : void j()
        }
    }

    function h() {
        $({
            x: a.els.cityMask.attr("x")
        }).animate({
            x: -1 * a.els.cityMask.attr("width")
        }, {
            duration: a.props.animationDuration,
            easing: a.props.animationEasing,
            step: function(b) {
                a.els.cityMask.attr("x", b)
            }
        }), $({
            x: a.els.trailMask.attr("x")
        }).animate({
            x: 0
        }, {
            duration: a.props.animationDuration,
            easing: a.props.animationEasing,
            step: function(b) {
                a.els.trailMask.attr("x", b)
            }
        }), $({
            x: a.els.line.attr("x1")
        }).animate({
            x: 0
        }, {
            duration: a.props.animationDuration,
            easing: a.props.animationEasing,
            step: function(b) {
                a.els.line.attr("x1", b), a.els.line.attr("x2", b)
            }
        }), a.els.line.animate({
            opacity: 0
        }, {
            duration: a.props.animationDuration,
            easing: a.props.animationEasing
        })
    }

    function i() {
        $({
            x: a.els.cityMask.attr("x")
        }).animate({
            x: 0
        }, {
            duration: a.props.animationDuration,
            easing: a.props.animationEasing,
            step: function(b) {
                a.els.cityMask.attr("x", b)
            }
        }), $({
            x: a.els.trailMask.attr("x")
        }).animate({
            x: a.els.trailMask.attr("width")
        }, {
            duration: a.props.animationDuration,
            easing: a.props.animationEasing,
            step: function(b) {
                a.els.trailMask.attr("x", b)
            }
        }), $({
            x: a.els.line.attr("x1")
        }).animate({
            x: a.els.trailMask.attr("width")
        }, {
            duration: a.props.animationDuration,
            easing: a.props.animationEasing,
            step: function(b) {
                a.els.line.attr("x1", b), a.els.line.attr("x2", b)
            }
        }), a.els.line.animate({
            opacity: 0
        }, {
            duration: a.props.animationDuration,
            easing: a.props.animationEasing
        })
    }

    function j() {
        $({
            x: a.els.cityMask.attr("x")
        }).animate({
            x: a.els.cityMask.attr("width") / -2
        }, {
            duration: a.props.animationDuration,
            easing: a.props.animationEasing,
            step: function(b) {
                a.els.cityMask.attr("x", b)
            }
        }), $({
            x: a.els.trailMask.attr("x")
        }).animate({
            x: a.els.trailMask.attr("width") / 2
        }, {
            duration: a.props.animationDuration,
            easing: a.props.animationEasing,
            step: function(b) {
                a.els.trailMask.attr("x", b)
            }
        }), $({
            x: a.els.line.attr("x1")
        }).animate({
            x: a.els.trailMask.attr("width") / 2
        }, {
            duration: a.props.animationDuration,
            easing: a.props.animationEasing,
            step: function(b) {
                a.els.line.attr("x1", b), a.els.line.attr("x2", b)
            }
        }), a.els.line.animate({
            opacity: 1
        }, {
            duration: a.props.animationDuration,
            easing: a.props.animationEasing
        })
    }

    function k(a) {
        return !!a && ["Terrain", "Mileage"].indexOf(a.id) > -1
    }
    if ($.easing.easeInOutCubic = function(a, b, c, d, e) {
            return (b /= e / 2) < 1 ? d / 2 * b * b * b + c : d / 2 * ((b -= 2) * b * b + 2) + c
        }, a.props = {
            loadedClass: "bf-city-trail--loaded",
            enteringClass: "bf-city-trail--enter",
            enterActiveClass: "bf-city-trail--enter-active",
            leavingClass: "bf-city-trail--leave",
            leaveActiveClass: "bf-city-trail--leave-active",
            leaveActiveReverseClass: "bf-city-trail--leave-active-reverse",
            activeClass: "bf-city-trail--active",
            svgUrl: b.getAttribute("data-url"),
            animationDuration: 500,
            animationEasing: "easeInOutCubic",
            terrainInputName: b.getAttribute("data-terrain-input-name") || "surface",
            trailInputValue: b.getAttribute("data-trail-input-value") || "trail",
            roadInputValue: b.getAttribute("data-road-input-value") || "road"
        }, a.state = {
            loaded: !1
        }, a.els = {
            container: b.querySelector("[data-image-container]") || b,
            cityMask: null,
            trailMask: null,
            line: null
        }, !a.props.svgUrl) return a.error("SVG url not defined");
    a.on(BF.events.SCREEN_TRANSITION_START, d), a.on(BF.events.SCREEN_TRANSITION_ACTIVE, e), a.on(BF.events.SCREEN_TRANSITION_END, f), a.on(BF.events.SET_FORM_VALUES, g),
        function() {
            $.get(a.props.svgUrl, function(d) {
                var e;
                void 0 !== (e = "object" == typeof d && "function" == typeof d.querySelector ? d.querySelector("svg") : $(d).find("svg")[0]) && (a.els.container.appendChild(e), a.state.loaded = !0, b.classList.add(a.props.loadedClass), setTimeout(function() {
                    c(), g()
                }))
            }).fail(function() {
                a.error("Failed to load image")
            })
        }()
}), BF.component("clear-form-value-on-click", function(a, b) {
    function c() {
        for (var b = document.querySelectorAll('input[name="' + a.props.propertyName + '"]'), c = 0; c < b.length; c++) {
            if ("select" == b[c].type || "text" == b[c].type) return void(b[c].value = "");
            b[c].checked = !1
        }
        setTimeout(function() {
            BF.services.form.updateFormValues()
        })
    }
    if (a.props = {
            propertyName: b.getAttribute("data-bf-clear-form-value-on-click")
        }, !a.props.propertyName) return a.error("Property name not specified");
    b.addEventListener("click", c)
}), BF.component("click-element", function(a, b) {
    return a.props = {
        elementSelector: b.getAttribute("data-bf-click-element")
    }, a.props.elementSelector ? (a.els = {
        element: document.querySelector(a.props.elementSelector)
    }, a.props.element ? void b.addEventListener("click", function(b) {
        a.props.element.click()
    }) : a.error("Element not found")) : a.error("Element Id not defined")
}), BF.component("close-alert-link", function(a, b) {
    b.addEventListener("click", function(b) {
        b.preventDefault(), a.emit(BF.events.CLOSE_ALERT)
    })
}), BF.component("close-info-overlay-link", function(a, b) {
    b.addEventListener("click", function(b) {
        b.preventDefault(), a.emit(BF.events.CLOSE_INFO_OVERLAY)
    })
}), BF.component("close-progress-link", function(a, b) {
    b.addEventListener("click", function(b) {
        b.stopPropagation(), b.preventDefault(), a.emit(BF.events.CLOSE_PROGRESS_MENU)
    })
}), BF.component("collapsable", function(a, b) {
    function c() {
        b.classList.contains(a.props.openClass) ? b.classList.remove(a.props.openClass) : b.classList.add(a.props.openClass)
    }
    a.props = {
        openClass: "open"
    }, b.addEventListener("click", c)
}), BF.component("document", function(a, b) {
    function c() {
        document.body.style.overflow = "hidden"
    }

    function d() {
        document.body.style.overflow = ""
    }
    a.on(BF.events.OPEN_INFO_OVERLAY, c), a.on(BF.events.CLOSE_INFO_OVERLAY, d)
}), BF.component("dynamic-template-container", function(a, b) {
    function c(b) {
        b.id === a.props.id && d(b.data)
    }

    function d(a) {
        b.innerHTML = "<div>" + a + "</div>", setTimeout(function() {
            BF.compile(b.childNodes[0])
        })
    }
    a.props = {
        id: b.getAttribute("data-screen-id")
    }, a.on(BF.events.SCREEN_DATA_LOADED, c)
}), BF.component("form-step", function(a, b) {
    function c() {
        var b = [];
        a.els.inputs.each(function() {
            this.hasAttribute("required") && -1 === b.indexOf(this.name) && b.push(this.name)
        }), BF.services.form.registerFormStep({
            id: a.props.screenId,
            requiredFields: b
        })
    }
    a.props = {
        screenId: b.getAttribute("data-id")
    }, a.els = {
        inputs: $(b).find("input")
    }, a.init(function() {
        c()
    })
}), BF.component("gtm-click-event", function(a, b) {}), BF.component("gtm-event", function(a, b) {}), BF.component("gtm-screen-active-event", function(a, b) {}), BF.component("gtm-user-response", function(a, b) {
    function c() {
        b.setAttribute("data-gtm-user-response", BF.services.form.inputValueString(a.props.inputName))
    }

    function d() {
        setTimeout(function() {
            console.log(b.getAttribute("data-gtm-user-response"))
        })
    }
    if (!b.getAttribute("data-bf-gtm-user-response")) return a.error("data-bf-gtm-user-response is required, and must be a valid input name");
    a.props = {
        inputName: b.getAttribute("data-bf-gtm-user-response")
    }, b.addEventListener("click", d.bind(this)), a.init(function() {
        c(), a.on(BF.events.SET_FORM_VALUES, c)
    })
}), BF.component("header", function(a, b) {
    function c() {
        b.classList.add(a.props.progressOpenClass)
    }

    function d() {
        b.classList.remove(a.props.progressOpenClass)
    }

    function e(c) {
        clearTimeout(a.state.closeTimeoutHandler), b.removeEventListener("mouseenter", l), b.removeEventListener("mouseleave", k)
    }

    function f(a) {
        BF.helpers.isFormScreen(a.active) ? g() : h()
    }

    function g() {
        b.classList.add(a.props.progressActiveClass)
    }

    function h() {
        b.classList.remove(a.props.progressActiveClass)
    }

    function i() {
        g(), b.addEventListener("mouseenter", l), b.addEventListener("mouseleave", k)
    }

    function j() {
        h(), b.removeEventListener("mouseenter", l), b.removeEventListener("mouseleave", k)
    }

    function k() {
        a.state.closeTimeoutHandler = setTimeout(function() {
            a.emit(BF.events.HIDE_PROGRESS_MENU), b.removeEventListener("mouseenter", l), b.removeEventListener("mouseleave", k)
        }, a.props.closeProgressTimeoutLength)
    }

    function l() {
        clearTimeout(a.state.closeTimeoutHandler)
    }
    a.props = {
        progressOpenClass: "bf-header--progress-open",
        progressActiveClass: "bf-header--progress-active",
        closeProgressTimeoutLength: 1e3
    }, a.state = {
        closeTimeoutHandler: null
    }, a.on(BF.events.OPEN_PROGRESS_MENU, c), a.on(BF.events.CLOSE_PROGRESS_MENU, d), a.on(BF.events.SCREEN_TRANSITION_START, e), a.on(BF.events.SCREEN_TRANSITION_ACTIVE, f), a.on(BF.events.SHOW_PROGRESS_MENU, i), a.on(BF.events.HIDE_PROGRESS_MENU, j)
}), BF.component("hide-on-form-complete", function(a, b) {
    function c() {
        setTimeout(function() {
            b.removeAttribute("style"), b.setAttribute("aria-hidden", "false")
        }, a.state.pageLoaded ? a.props.changeLength : 0)
    }

    function d() {
        setTimeout(function() {
            b.style.display = "none", b.setAttribute("aria-hidden", "true")
        }, a.state.pageLoaded ? a.props.changeLength : 0)
    }

    function e(a) {
        setTimeout(function() {
            BF.services.form.formIsComplete() ? d() : c()
        })
    }
    a.props = {
        pageLoadTime: 2e3,
        changeLength: 1e3
    }, a.state = {
        pageLoaded: !1
    }, a.on(BF.events.SET_FORM_VALUES, e), setTimeout(function() {
        a.state.pageLoaded = !0
    }, a.props.pageLoadTime)
}), BF.component("hide-on-form-progress", function(a, b) {
    function c() {
        setTimeout(function() {
            b.removeAttribute("style"), b.setAttribute("aria-hidden", "false")
        }, a.state.pageLoaded ? a.props.changeLength : 0)
    }

    function d() {
        setTimeout(function() {
            b.style.display = "none", b.setAttribute("aria-hidden", "true")
        }, a.state.pageLoaded ? a.props.changeLength : 0)
    }

    function e() {
        BF.services.form.completedSteps().length ? d() : c()
    }
    a.props = {
        pageLoadTime: 2e3,
        changeLength: 1e3
    }, a.state = {
        pageLoaded: !1
    }, a.on(BF.events.SET_FORM_VALUES, function() {
        setTimeout(e)
    }), setTimeout(function() {
        a.state.pageLoaded = !0
    }, a.props.pageLoadTime)
}), BF.component("image", function(a, b) {
    function c() {
        b.classList.add("loaded")
    }! function() {
        return b.complete && 0 !== b.naturalHeight
    }() ? b.addEventListener("load", c.bind(this)): c()
}), BF.component("info-overlay", function(a, b) {
    function c(c) {
        var d = document.getElementById(c);
        if (!d) return a.error("Info overlay template not found");
        a.els.content.innerHTML = d.innerHTML, BF.compile(a.els.content), window.requestAnimationFrame(function() {
            b.classList.add(a.props.activeClass)
        }), document.addEventListener("keydown", e), b.style.display = "", setTimeout(function() {
            a.els.content.focus()
        }, 250)
    }

    function d() {
        window.requestAnimationFrame(function() {
            b.classList.remove(a.props.activeClass)
        }), document.removeEventListener("keydown", e), setTimeout(function() {
            b.style.display = "none"
        }, 500)
    }

    function e(b) {
        "Escape" === b.key && a.emit(BF.events.CLOSE_INFO_OVERLAY)
    }
    if (a.props = {
            activeClass: "bf-info-overlay--open"
        }, a.els = {
            content: b.querySelector("[data-content]")
        }, !a.els.content) return a.error("Content element not found");
    b.style.display = "none", a.on(BF.events.OPEN_INFO_OVERLAY, c), a.on(BF.events.CLOSE_INFO_OVERLAY, d)
}), BF.component("info-overlay-link", function(a, b) {
    function c(a) {
        a.preventDefault(), d()
    }

    function d() {
        a.state.open = !0, a.emit(BF.events.OPEN_INFO_OVERLAY, a.props.templateId)
    }

    function e() {
        a.state.open && (a.state.open = !1, b.focus())
    }
    a.props = {
        templateId: b.getAttribute("data-template-id")
    }, a.state = {
        open: !1
    }, b.addEventListener("click", c), a.on(BF.events.CLOSE_INFO_OVERLAY, e)
}), BF.component("injuries", function(a, b) {
    function c() {
        var b = BF.services.form.formValues().filter(function(b) {
            return b.name == a.props.injuryInputName
        });
        b.length > 1 && (a.els.noInjuriesInput.checked = !1), 0 === b.length || d(b) ? (a.els.continueButton.style.display = "none", a.els.noInjuriesButton.style.display = "block") : (a.els.continueButton.style.display = "block", a.els.noInjuriesButton.style.display = "none")
    }

    function d(b) {
        return b.filter(function(b) {
            return b.value == a.props.noInjuriesValue
        }).length > 0
    }

    function e() {
        for (var b = 0; b < a.els.injuryOptions.length; b++) a.els.injuryOptions[b].checked = !1;
        a.els.noInjuriesInput.checked = !0
    }
    a.props = {
        injuryInputName: b.getAttribute("data-injury-input-name"),
        noInjuriesValue: b.getAttribute("data-no-injuries-value")
    }, a.els = {
        noInjuriesButton: b.querySelector("[data-no-injuries-button]"),
        noInjuriesInput: b.querySelector("[data-no-injuries-input]"),
        continueButton: b.querySelector("[data-continue-button]"),
        injuryOptions: b.querySelectorAll("[data-injury-option]")
    }, a.els.noInjuriesButton.addEventListener("click", e), a.init(function() {
        c(), a.on(BF.events.SET_FORM_VALUES, c)
    })
}), BF.component("injury-value", function(a, b) {
    function c() {
        var c = BF.services.form.formValues().filter(function(b) {
            return b.name == a.props.injuryInputName
        });
        if (b.textContent = "", c.length) return 1 == c.length ? void(b.textContent = a.props.labels[c[0].value]) : void c.map(function(c, d) {
            b.textContent += d > 0 ? ", " + a.props.labels[c.value] : a.props.labels[c.value]
        })
    }
    return b.getAttribute("data-value-label-map") ? b.getAttribute("data-input-name") ? (a.props = {
        injuryInputName: b.getAttribute("data-input-name"),
        labels: JSON.parse(b.getAttribute("data-value-label-map"))
    }, void a.init(function() {
        c(), a.on(BF.events.SET_FORM_VALUES, c)
    })) : a.error("data-input-name attribute is required") : a.error("data-value-label-map attribute is required, and must be an object parsable to JSON")
}), BF.component("input-button", function(a, b) {
    a.props = {
        inputId: b.getAttribute("data-input-id"),
        inputValue: b.getAttribute("data-input-value")
    }, a.els = {
        input: a.props.inputId ? document.getElementById(a.props.inputId) : null
    }, b.addEventListener("click", function(b) {
        a.els.input && ("radio" != a.els.input.type && "checkbox" != a.els.input.type || (a.els.input.checked = !0)), BF.services.form.updateFormValues()
    })
}), BF.component("load-template", function(a, b) {
    return b.getAttribute("data-template") ? (a.props = {
        template: document.getElementById(b.getAttribute("data-template")).innerHTML
    }, a.props.template ? void a.init(function() {
        var c = $(a.props.template)[0];
        $(b).replaceWith(c), BF.compile(c)
    }) : a.error("Valid template ID required")) : a.error("Template id not specified")
}), BF.component("load-template-before-screen", function(a, b) {
    function c(b) {
        !a.state.loaded && b.active.id === a.props.id && e()
    }

    function d(b) {
        !a.state.loaded && BF.services.screens.relativeScreenIndex(a.props.id) >= -1 && BF.services.screens.relativeScreenIndex(a.props.id) <= 1 && e()
    }

    function e() {
        a.state.loaded = !0, a.els.template = $(a.props.template)[0], $(b).replaceWith(a.els.template), BF.compile(a.els.template)
    }
    var f = b.getAttribute("data-template"),
        g = document.getElementById(f);
    if (!g) return a.error("Valid template Id required. " + (f ? "Specified Id was " + f : "Id not specified"));
    a.props = {
        id: b.getAttribute("data-id"),
        template: g.innerHTML
    }, a.state = {
        loaded: !1
    }, a.els = {
        template: null
    }, a.on(BF.events.SCREEN_TRANSITION_START, c), a.on(BF.events.SCREEN_TRANSITION_END, d)
}), BF.component("loading-screen", function(a, b) {
    function c(b) {
        b.active.id === a.props.id && setTimeout(function() {
            BF.services.screens.nextScreen()
        }, a.props.loadingTime)
    }
    a.props = {
        id: b.getAttribute("data-id"),
        loadingTime: 1500
    }, a.on(BF.events.SCREEN_TRANSITION_END, c)
}), BF.component("logo", function(a, b) {
    function c(c) {
        $(b).removeClass([a.props.visibleClass, a.props.smallClass, a.props.largeClass, a.props.checkpointClass].join(" ")), "checkpoint" === c.active.type ? (b.classList.remove(a.props.visibleClass), b.classList.add(a.props.checkpointClass)) : b.classList.add(a.props.visibleClass), "Start" !== c.active.id ? b.classList.add(a.props.smallClass) : b.classList.add(a.props.largeClass)
    }
    a.props = {
        visibleClass: "bf-logo--visible",
        disableTransitionClass: "bf-logo--disable-transitions",
        checkpointClass: "bf-logo--checkpoint",
        smallClass: "bf-logo--small",
        largeClass: "bf-logo--large"
    }, a.on(BF.events.SCREEN_TRANSITION_ACTIVE, c), b.classList.add(a.props.disableTransitionClass), setTimeout(function() {
        b.classList.remove(a.props.disableTransitionClass)
    }, 2e3)
}), BF.component("next-screen-link", function(a, b) {
    b.addEventListener("click", function(a) {
        BF.services.screens.nextScreen()
    })
}), BF.component("open-progress-link", function(a, b) {
    BF.services.device.hasTouch && b.addEventListener("click", function(b) {
        a.emit(BF.events.OPEN_PROGRESS_MENU)
    })
}), BF.component("page", function(a, b) {
    function c() {
        b.scrollHeight > b.offsetHeight && (b.style.paddingRight = BF.services.scroll.scrollbarWidth() + "px")
    }

    function d() {
        b.style.paddingRight = ""
    }
    a.on(BF.events.OPEN_INFO_OVERLAY, c), a.on(BF.events.CLOSE_INFO_OVERLAY, d)
}), BF.component("progress", function(a, b) {
    function c(c) {
        b.classList.add(a.props.screenChangeClass), b.classList.remove(a.props.hoveredClass, b.classList.remove(a.props.recentlyHoveredClass)), a.els.items.removeClass(a.props.itemActiveClass), l(), setTimeout(function() {
            p(BF.services.screens.formScreenIndexById(c.active.id))
        }, 700)
    }

    function d(a) {
        BF.helpers.isFormScreen(a.active) ? v() : w()
    }

    function e(c) {
        b.classList.remove(a.props.screenChangeClass), BF.helpers.isFormScreen(c.active) && setTimeout(function() {
            q()
        }, 300)
    }

    function f() {
        q()
    }

    function g() {
        a.els.items.each(function(a) {
            this.addEventListener("click", function(b) {
                b.stopPropagation(), h(a)
            }), this.addEventListener("keypress", function(b) {
                32 != b.keyCode && 13 != b.keyCode || (b.stopPropagation(), b.preventDefault(), h(a))
            })
        }), !BF.services.device.hasTouch && i()
    }

    function h(b) {
        a.state.open && a.emit(BF.events.CLOSE_PROGRESS_MENU), BF.services.form.completedByIndex(b) && BF.services.screens.changeScreen(A()[b].id)
    }

    function i() {
        b.classList.add(a.props.canHoverClass), a.els.items.each(function(b) {
            this.addEventListener("mouseenter", j.bind(a))
        }), b.addEventListener("mouseleave", function() {
            k()
        })
    }

    function j(c) {
        BF.services.form.completedByIndex($(c.target).index()) && z() !== $(c.target).index() ? b.classList.add(a.props.hoveredClass) : k()
    }

    function k() {
        b.classList.remove(a.props.hoveredClass), b.classList.add(a.props.recentlyHoveredClass), setTimeout(function() {
            b.classList.remove(a.props.recentlyHoveredClass)
        }, 200)
    }

    function l() {
        a.els.items.removeClass(a.props.itemActiveClass), null !== z() && a.els.items[z()] && n(a.els.items[z()]), a.els.items.removeClass([a.props.itemCompleteClass, a.props.itemIncompleteClass].join(" ")), a.els.items.each(function(a) {
            a !== z() && (BF.services.form.completedByIndex(a) ? m(this) : o(this))
        })
    }

    function m(b) {
        b.classList.add(a.props.itemCompleteClass), r(b, "role", "link"), r(b, "tabindex", "0")
    }

    function n(b) {
        b.classList.add(a.props.itemActiveClass), r(b, "role", "heading"), r(b, "tabindex", "0")
    }

    function o(b) {
        b.classList.add(a.props.itemIncompleteClass), r(b, "role", ""), r(b, "tabindex", "")
    }

    function p(b) {
        s(b), setTimeout(function(b) {
            a.els.indicator.textContent = b + 1 < A().length ? b + 1 : A().length
        }, 250, b)
    }

    function q() {
        a.state.width = b.offsetWidth, s(z())
    }

    function r(a, b, c) {
        a.hasAttribute(b) && a.getAttribute(b) == c || a.setAttribute(b, c)
    }

    function s(b) {
        a.els.indicator.style.opacity = b >= A().length ? 0 : 1;
        var c = b / (a.props.numberOfItems - 1);
        $(a.els.indicator).css(BF.helpers.prefixedCssObject({
            transform: "translateX(" + (b === A().length ? a.state.width : a.state.width * c) + "px)"
        })), $(a.els.indicator).css({
            top: c > 1 ? "100%" : 100 * c + "%"
        })
    }

    function t() {
        q(), b.classList.add(a.props.noTransitionDelayClass), v()
    }

    function u() {
        b.classList.remove(a.props.noTransitionDelayClass), w()
    }

    function v() {
        b.classList.add(a.props.activeClass), b.classList.add(a.props.openingClass), setTimeout(function() {
            b.classList.remove(a.props.openingClass)
        }, 500)
    }

    function w() {
        b.classList.remove(a.props.activeClass)
    }

    function x() {
        a.state.open || (a.state.open = !0, b.classList.add(a.props.openClass), a.emit(BF.events.HIDE_SCREENS))
    }

    function y() {
        a.state.open && (a.state.open = !1, b.classList.remove(a.props.openClass), a.emit(BF.events.SHOW_SCREENS), b.classList.add(a.props.closingClass), setTimeout(function() {
            b.classList.remove(a.props.closingClass)
        }, 100), setTimeout(function() {
            q()
        }))
    }

    function z() {
        return BF.services.screens.formScreenIndexById(BF.services.screens.activeScreenId())
    }

    function A() {
        return BF.services.screens.screensByType("form")
    }
    a.props = {
        activeClass: "bf-progress--active",
        openClass: "bf-progress--open",
        openingClass: "bf-progress--opening",
        closingClass: "bf-progress--closing",
        hoveredClass: "bf-progress--hovered",
        recentlyHoveredClass: "bf-progress--recently-hovered",
        canHoverClass: "bf-progress--can-hover",
        noTransitionDelayClass: "bf-progress--no-delay",
        screenChangeClass: "bf-progress--in-screen-change",
        numberOfItems: $(b.querySelector("[data-items]")).children().length,
        itemActiveClass: "active",
        itemCompleteClass: "completed",
        itemIncompleteClass: "incomplete"
    }, a.state = {
        width: b.offsetWidth,
        open: !1
    }, a.els = {
        indicator: b.querySelector("[data-active-indicator]"),
        items: $(b.querySelector("[data-items]")).children()
    }, a.on(BF.events.SCREEN_TRANSITION_START, c), a.on(BF.events.SCREEN_TRANSITION_ACTIVE, d), a.on(BF.events.SCREEN_TRANSITION_END, e), a.on(BF.events.WINDOW_RESIZE, f), a.on(BF.events.OPEN_PROGRESS_MENU, x), a.on(BF.events.CLOSE_PROGRESS_MENU, y), a.on(BF.events.SHOW_PROGRESS_MENU, t), a.on(BF.events.HIDE_PROGRESS_MENU, u), a.init(function() {
        setTimeout(l), g()
    })
}), BF.component("restart-link", function(a, b) {
    b.addEventListener("click", function(a) {
        BF.services.form.reset(), setTimeout(function() {
            BF.services.screens.nextScreen()
        })
    })
}), BF.component("results-header-pad", function(a, b) {
    function c() {
        BF.services.device.hasTouch || BF.services.window.width() > a.props.browserEndWidth || $(b).animate({
            "padding-top": a.props.padding
        }, a.props.transitionDuration)
    }

    function d() {
        $(b).animate({
            "padding-top": 0
        }, a.props.transitionDuration)
    }
    a.props = {
        padding: 65,
        transitionDuration: 400,
        browserEndWidth: 1200
    }, a.on(BF.events.SHOW_PROGRESS_MENU, c), a.on(BF.events.HIDE_PROGRESS_MENU, d)
}), BF.component("results-nav", function(a, b) {
    function c() {
        b.classList.add(a.props.hiddenClass)
    }

    function d() {
        b.classList.remove(a.props.hiddenClass)
    }
    a.props = {
        hiddenClass: "hide"
    }, a.on(BF.events.SHOW_PROGRESS_MENU, c), a.on(BF.events.HIDE_PROGRESS_MENU, d)
}), BF.component("results-sticky-nav", function(a, b) {
    function c() {
        for (var b = 0; b < a.els.results.length; b++) {
            var c = $('<i class="' + a.props.itemClass + '" >' + (b + 1) + "</i>")[0];
            c.addEventListener("click", n), a.els.items.push(c), a.els.itemContainer.appendChild(c)
        }
    }

    function d() {
        for (var c = 0; c < a.els.results.length; c++) a.state.resultOffsets[c] = $(a.els.results[c]).offset().top, a.els.results.length === c + 1 && (a.state.resultsHeight = $(a.els.results[c]).offset().top + $(a.els.results[c]).height());
        a.state.navOffset = $(b).offset().top, a.state.navHeight = a.els.stickyEl.offsetHeight
    }

    function e(c) {
        if (b.classList.remove(a.props.completeClass), a.els.items.map(function(b) {
                b.classList.remove(a.props.itemActiveClass)
            }), c > a.state.resultsHeight - h() / 2) return b.classList.add(a.props.completeClass);
        var d = null;
        a.state.resultOffsets.map(function(a, b) {
            d = c + h() / 2 > a ? b : d
        }), null !== d && a.els.items[d].classList.add(a.props.itemActiveClass)
    }

    function f(c) {
        c > a.state.navOffset - a.props.stickyOffset ? b.classList.add(a.props.stickyClass) : b.classList.remove(a.props.stickyClass)
    }

    function g(b) {
        b > 400 ? ($(a.els.showOnTop).css("display", "none"), $(a.els.showOnScroll).css("display", "")) : ($(a.els.showOnScroll).css("display", "none"), $(a.els.showOnTop).css("display", ""))
    }

    function h() {
        return BF.services.window.height()
    }

    function i() {
        return BF.services.scroll.position()
    }

    function j(b) {
        a.els.items.length && (f(b.y), e(b.y), g(b.y))
    }

    function k() {
        clearTimeout(a.state.windowResizeHandler), a.state.windowResizeHandler = setTimeout(function() {
            d(), f(i()), e(i())
        }, 500)
    }

    function l() {
        d(), a.els.results.length > 1 && b.classList.add(a.props.activeClass)
    }

    function m(b) {
        p(a.state.resultOffsets[b] - a.props.stickyOffset)
    }

    function n() {
        m($(this).index())
    }

    function o() {
        p(0)
    }

    function p(a) {
        $("html, body").animate({
            scrollTop: a
        }, 1e3)
    }
    a.props = {
        activeClass: "bf-results-sticky-nav--active",
        stickyClass: "bf-results-sticky-nav--sticky",
        completeClass: "bf-results-sticky-nav--complete",
        itemClass: "bf-results-sticky-nav__item",
        itemActiveClass: "bf-results-sticky-nav__item--active",
        stickyOffset: 40
    }, a.state = {
        resultOffsets: [],
        resultsHeight: 0,
        navHeight: 0,
        navOffset: 0,
        isStuck: !1,
        windowResizeHandler: null
    }, a.els = {
        stickyEl: b.querySelector("[data-sticky-el]"),
        itemContainer: b.querySelector("[data-items]"),
        topLink: b.querySelector("[data-top-link]"),
        showOnTop: b.querySelectorAll("[data-show-at-top]"),
        showOnScroll: b.querySelectorAll("[data-show-on-scrolled]"),
        items: [],
        results: document.querySelectorAll("[data-finder-result]")
    }, a.on(BF.events.USER_SCROLL, j), a.on(BF.events.WINDOW_RESIZE, k), a.on(BF.events.SCREEN_TRANSITION_END, l), a.els.topLink && a.els.topLink.addEventListener("click", o), a.init(function() {
        c(), g(i())
    })
}), BF.component("screen", function(a, b) {
    function c(c) {
        b.classList.remove(a.props.activeClass), h(c) ? ($(b).addClass([a.props.renderClass, a.props.enterClass].join(" ")), setTimeout(function() {
            f()
        })) : i(c) ? $(b).addClass([a.props.renderClass, a.props.leaveClass].join(" ")) : b.classList.remove(a.props.renderClass)
    }

    function d(c) {
        $(b).removeClass([a.props.enterClass, a.props.leaveClass].join(" ")), h(c) && (b.classList.add(a.props.enterActiveClass), c.reverse && b.classList.add(a.props.enterReverseActiveClass)), i(c) && (b.classList.add(a.props.leaveActiveClass), c.reverse && b.classList.add(a.props.leaveReverseActiveClass)), h(c) && c.previous && l()
    }

    function e(c) {
        $(b).removeClass([a.props.enterActiveClass, a.props.leaveActiveClass, a.props.enterReverseActiveClass, a.props.leaveReverseActiveClass].join(" ")), h(c) && (b.classList.add(a.props.activeClass), setTimeout(function() {
            f()
        })), i(c) && b.classList.remove(a.props.renderClass)
    }

    function f() {
        BF.helpers.isIE() && setTimeout(function() {
            var a = $(b).children().first().outerHeight();
            b.style.height = a > BF.services.window.height() || BF.services.window.width() < 1e3 ? "" : a + "px"
        })
    }

    function g() {
        BF.services.screens.activeScreenId() == a.props.id && setTimeout(f, 50)
    }

    function h(b) {
        return b.active.id === a.props.id
    }

    function i(b) {
        return !!b.previous && b.previous.id === a.props.id
    }

    function j() {
        b.style.display = "none"
    }

    function k() {
        b.style.display = ""
    }

    function l() {
        var a = b.querySelector("[data-focus-first]");
        a ? a.focus() : b.focus()
    }
    var m = b.getAttribute("data-class-prefix") || "bf-screen--";
    a.props = {
        id: b.getAttribute("data-id"),
        type: b.getAttribute("data-type") || null,
        hasPriority: b.hasAttribute("data-priority-screen"),
        dependency: b.getAttribute("data-wait-for") || null,
        renderClass: m + "render",
        enterClass: m + "enter",
        enterActiveClass: m + "enter-active",
        enterReverseActiveClass: m + "enter-reverse-active",
        leaveClass: m + "leave",
        leaveActiveClass: m + "leave-active",
        leaveReverseActiveClass: m + "leave-reverse-active",
        activeClass: m + "active"
    }, a.on(BF.events.SCREEN_TRANSITION_START, c), a.on(BF.events.SCREEN_TRANSITION_ACTIVE, d), a.on(BF.events.SCREEN_TRANSITION_END, e), a.on(BF.events.HIDE_SCREENS, j), a.on(BF.events.SHOW_SCREENS, k), a.on(BF.events.WINDOW_RESIZE, g), a.init(function() {
        BF.services.screens.registerScreen({
            id: a.props.id,
            type: a.props.type,
            hasPriority: a.props.hasPriority,
            dependency: a.props.dependency && BF.endpoints[a.props.dependency] ? function() {
                return BF.services.api.call(BF.endpoints[a.props.dependency].url, BF.endpoints[a.props.dependency].type)
            } : null
        })
    })
}), BF.component("screen-load-button", function(a, b) {
    function c() {
        b.classList.add(a.props.buttonLoadingClass)
    }

    function d() {
        b.classList.remove(a.props.buttonLoadingClass)
    }
    a.props = {
        buttonLoadingClass: "bf-button--loading"
    }, a.on(BF.events.LOADING_SCREEN_DATA, c), a.on(BF.events.SCREEN_DATA_LOADED, d)
}), BF.component("send-form-progress", function(a, b) {
    b.addEventListener("click", function(a) {
        BF.services.form.sendFormProgress()
    })
}), BF.component("show-on-form-complete", function(a, b) {
    function c() {
        setTimeout(function() {
            b.removeAttribute("style"), b.setAttribute("aria-hidden", "false")
        }, a.state.pageLoaded ? a.props.changeLength : 0)
    }

    function d() {
        setTimeout(function() {
            b.style.display = "none", b.setAttribute("aria-hidden", "true")
        }, a.state.pageLoaded ? a.props.changeLength : 0)
    }

    function e(a) {
        setTimeout(function() {
            BF.services.form.formIsComplete() ? c() : d()
        })
    }
    a.props = {
        pageLoadTime: 2e3,
        changeLength: 1e3
    }, a.state = {
        pageLoaded: !1
    }, a.on(BF.events.SET_FORM_VALUES, e), setTimeout(function() {
        a.state.pageLoaded = !0
    }, a.props.pageLoadTime)
}), BF.component("show-on-form-progress", function(a, b) {
    function c() {
        setTimeout(function() {
            b.removeAttribute("style"), b.setAttribute("aria-hidden", "false")
        }, a.state.pageLoaded ? a.props.changeLength : 0)
    }

    function d() {
        setTimeout(function() {
            b.style.display = "none", b.setAttribute("aria-hidden", "true")
        }, a.state.pageLoaded ? a.props.changeLength : 0)
    }

    function e() {
        BF.services.form.completedSteps().length ? c() : d()
    }
    a.props = {
        pageLoadTime: 2e3,
        changeLength: 1e3
    }, a.state = {
        pageLoaded: !1
    }, a.on(BF.events.SET_FORM_VALUES, function() {
        setTimeout(e)
    }), setTimeout(function() {
        a.state.pageLoaded = !0
    }, a.props.pageLoadTime)
}), BF.component("show-on-form-value", function(a, b) {
    function c() {
        b.removeAttribute("style"), b.setAttribute("aria-hidden", "false")
    }

    function d() {
        b.style.display = "none", b.setAttribute("aria-hidden", "true")
    }

    function e(b) {
        var e = b.filter(function(b) {
            return b.name == a.props.name
        });
        e.length && e[0].value === a.props.value ? c() : d()
    }
    a.props = {
        name: b.getAttribute("data-name"),
        value: b.getAttribute("data-value")
    }, a.on(BF.events.SET_FORM_VALUES, e)
}), BF.component("show-progress-link", function(a, b) {
    a.els = {
        nav: document.querySelector("[data-bf-progress]")
    }, b.addEventListener("click", function(b) {
        b.preventDefault(), BF.services.device.hasTouch ? a.emit(BF.events.OPEN_PROGRESS_MENU) : a.emit(BF.events.SHOW_PROGRESS_MENU), setTimeout(function() {
            a.els.nav && $(a.els.nav.querySelector("[data-items]")).children()[0].focus()
        }, 500)
    })
}), BF.component("skeleton", function(a, b) {
    function c() {
        $.get(a.props.svgUrl, function(c) {
            var e;
            void 0 !== (e = "object" == typeof c && "function" == typeof c.querySelector ? c.querySelector("svg") : $(c).find("svg")[0]) && (b.appendChild(e), b.classList.add(a.props.loadedClass), d())
        }).fail(function() {
            a.error("Failed to load image")
        })
    }

    function d(c) {
        var d = BF.services.form.formValues().filter(function(b) {
            return b.name == a.props.injuryInputName
        });
        $(b).removeClass([a.props.footClass, a.props.legClass, a.props.kneeClass].join(" ")), d.map(function(c) {
            c.value === a.props.footValue && b.classList.add(a.props.footClass), c.value === a.props.legValue && b.classList.add(a.props.legClass), c.value === a.props.kneesValue && b.classList.add(a.props.kneeClass)
        })
    }
    if (a.props = {
            loadedClass: "bf-media--loaded",
            footClass: "bf-skeleton--foot",
            legClass: "bf-skeleton--leg",
            kneeClass: "bf-skeleton--knee",
            svgUrl: b.getAttribute("data-url"),
            injuryInputName: b.getAttribute("data-injury-input-name"),
            footValue: b.getAttribute("data-foot-input-value"),
            legValue: b.getAttribute("data-leg-input-value"),
            kneesValue: b.getAttribute("data-knees-input-value")
        }, !a.props.svgUrl) return a.error("SVG url not found");
    a.init(function() {
        c(), a.on(BF.events.SET_FORM_VALUES, d)
    })
}), BF.component("stepped-animation", function(a, b) {
    function c() {
        a.state.active || (a.state.active = !0, a.state.intervalHandler = setInterval(function() {
            a.state.tick = a.state.tick >= a.props.steps ? 1 : a.state.tick + 1;
            for (var c = 1; c <= a.props.steps; c++) b.classList.remove("animation-" + c);
            b.classList.add("animation-" + a.state.tick)
        }, a.props.intervalLength))
    }

    function d() {
        a.state.active && (a.state.active = !1, clearInterval(a.state.intervalHandler))
    }

    function e(b) {
        a.props.activeScreens && a.props.activeScreens.indexOf(b.active.id) > -1 && c()
    }

    function f(b) {
        a.props.activeScreens && -1 === a.props.activeScreens.indexOf(b.active.id) && d()
    }
    if (a.state = {
            tick: 1,
            active: !1,
            intervalHandler: null
        }, a.props = {
            activeScreens: !!b.getAttribute("data-active-screens") && b.getAttribute("data-active-screens").split(","),
            steps: b.getAttribute("data-steps") ? JSON.parse(b.getAttribute("data-steps")) : 3,
            intervalLength: 150,
            startDelay: b.getAttribute("data-start-delay") ? JSON.parse(b.getAttribute("data-start-delay")) : 0
        }, a.on(BF.events.SCREEN_TRANSITION_ACTIVE, e), a.on(BF.events.SCREEN_TRANSITION_END, f), !a.props.activeScreens) return void setTimeout(function() {
        c()
    }, a.props.startDelay)
}), BF.component("svg", function(a, b) {
    function c() {
        $.get(a.props.svgUrl, function(c) {
            var d;
            void 0 !== (d = "object" == typeof c && "function" == typeof c.querySelector ? c.querySelector("svg") : $(c).find("svg")[0]) && (a.els.container.appendChild(d), a.state.loaded = !0, b.classList.add(a.props.loadedClass))
        }).fail(function() {
            a.error("Failed to load image")
        })
    }
    if (a.props = {
            loadedClass: b.getAttribute("data-loaded-class") || "bf-media--loaded",
            svgUrl: b.getAttribute("data-url")
        }, a.state = {
            loaded: !1
        }, a.els = {
            container: b.querySelector("[data-image-container]") || b
        }, !a.props.svgUrl) return a.error("SVG url not found");
    a.init(function() {
        c()
    })
}), BF.component("video", function(a, b) {
    function c() {
        if (BF.services.device && BF.services.device.hasSlowConnection) return void e();
        d(), setTimeout(function() {
            f(), g(), h(), i(), !BF.services.device.hasTouch && a.els.container.classList.add(a.props.noTouchClass)
        })
    }

    function d() {
        var c = a.props.template;
        c = c.replace("source", 'source src="' + a.props.src + '"'), c = c.replace("img", 'img src="' + a.props.placeholder + '" '), c = c.replace('alt=""', 'alt="' + a.props.title + '"'), b.innerHTML = c
    }

    function e() {
        b.innerHTML = '<img src="' + a.props.placeholder + '"' + (a.props.title ? ' alt="' + a.props.title + '"' : "") + " />"
    }

    function f() {
        a.els.container = b.querySelector("[data-container]"), a.els.video = b.querySelector("video"), a.els.pauseIcon = b.querySelector("[data-pause-icon]"), a.els.playIcon = b.querySelector("[data-play-icon]"), a.els.toggle = b.querySelector("[data-pause-toggle]"), a.els.progressCircle = b.querySelector("[data-progress-circle]"), a.els.hoverContainer = $(b).parents("[data-bf-input-button]")[0] || b
    }

    function g() {
        BF.services.device.hasTouch && a.els.toggle.addEventListener("click", function(b) {
            b.preventDefault(), b.stopPropagation(), a.state.playing ? j() : k()
        }), a.els.hoverContainer.addEventListener("mouseenter", function() {
            !r() && k()
        }), a.els.hoverContainer.addEventListener("mouseleave", function() {
            r() && j(), l()
        }), a.els.toggle.addEventListener("mouseleave", function() {
            a.els.hoverContainer.classList.remove(a.props.toggleActiveClass)
        }), a.els.toggle.addEventListener("mouseenter", function() {
            a.els.hoverContainer.classList.add(a.props.toggleActiveClass)
        })
    }

    function h() {
        a.els.video.addEventListener("play", m.bind(this)), a.els.video.addEventListener("pause", o.bind(this)), a.els.video.addEventListener("playing", p.bind(this)), a.els.video.addEventListener("timeupdate", q.bind(this)), a.els.video.addEventListener("canplay", n.bind(this))
    }

    function i() {
        if (a.els.progressCircle) {
            var b = 2 * a.els.progressCircle.r.baseVal.value * Math.PI;
            a.props.progressCircleCircumference = b, a.els.progressCircle.style.strokeDasharray = b, s(0)
        }
    }

    function j() {
        a.els.video.pause()
    }

    function k() {
        a.state.canPlay && a.els.video.play()
    }

    function l() {
        a.els.video.currentTime = 0
    }

    function m() {
        a.state.hasPlayed || (a.state.hasPlayed = !0, a.els.container.classList.add(a.props.readyClass), BF.services.device.hasTouch || (j(), l())), a.state.hasPlayed = !0, a.state.playing || (a.state.playing = !0, a.els.container.classList.add(a.props.playingClass))
    }

    function n() {
        a.state.canPlay = !0
    }

    function o() {
        a.state.playing = !1, a.els.container.classList.remove(a.props.playingClass)
    }

    function p() {
        !a.state.playing && m()
    }

    function q() {
        s(a.els.video.currentTime / a.els.video.duration)
    }

    function r() {
        return a.els.video.currentTime > 0 && !a.els.video.paused && !a.els.video.ended && a.els.video.readyState > 2
    }

    function s(b) {
        a.els.progressCircle.style.strokeDashoffset = a.props.progressCircleCircumference * (1 - b), a.state.progress && b < a.state.progress ? a.els.progressCircle.style.transition = "none" : a.els.progressCircle.style.transition = "", a.state.progress = b
    }
    if (a.props = {
            src: b.getAttribute("data-video-src"),
            placeholder: b.getAttribute("data-placeholder"),
            title: b.getAttribute("data-title"),
            template: document.getElementById("VideoTemplate").innerHTML,
            noTouchClass: "bf-video--no-touch",
            playingClass: "bf-video--playing",
            readyClass: "bf-video--ready",
            toggleActiveClass: "bf-media-button--unhover",
            progressCircleCircumference: 0
        }, a.state = {
            canPlay: !1,
            playing: !1,
            hasPlayed: !1,
            progress: 0
        }, a.els = {
            container: null,
            video: null,
            toggle: null,
            pauseIcon: null,
            playIcon: null,
            hoverContainer: null,
            progressCircle: null
        }, !a.props.template) return a.error("Video template not found");
    a.init(c)
});

function getscore(){
    var surface = $("[data-gtm-step-number=1]").find(".bf-progress__item__value div[aria-hidden=false]").text();
    console.log(surface);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/ShoeFinder-score',
        type: 'get',
        success: function(a) {
            if(surface=='Trail'){
                if(a <= 50 ){
                   $("#shoe_hide1").removeClass("divhide");
                   $("#shoe_hide2").removeClass("divhide");
                }else{
                    $("#shoe_hide1").addClass("divhide");
                    $("#shoe_hide2").addClass("divhide");
                 }
            }else if(surface=='Road'){   
                $("#shoe_hide1").removeClass("divhide");
                $("#shoe_hide2").removeClass("divhide");
            }
        },
        error: function() {
            d("There was an error. Please try again")
        }
    })
    
}