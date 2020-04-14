/*!
 * SuperSlide v2.1.3
 * http://www.SuperSlide2.com
 * http://www.banzhuanlove.cn
 * Copyright 2011-today
 */
! function(a) {
	a.fn.slide = function(b) {
		return a.fn.slide.defaults = {
			type: "slide",
			effect: "fade",
			autoPlay: !1,
			delayTime: 500,
			interTime: 2500,
			triggerTime: 150,
			defaultIndex: 0,
			titCell: ".nav li",
			mainCell: ".forum",
			targetCell: null,
			trigger: "mouseover",
			scroll: 1,
			vis: 1,
			titOnClassName: "on",
			autoPage: !1,
			prevCell: ".prev",
			nextCell: ".next",
			pageStateCell: ".pageState",
			opp: !1,
			pnLoop: !0,
			easing: "swing",
			startFun: null,
			endFun: null,
			switchLoad: null,
			playStateCell: ".playState",
			mouseOverStop: !0,
			defaultPlay: !0,
			returnDefault: !1
		}, this.each(function() {
			var t, u, v, w, x, y, z, A, B, C, D, E, F, G, H, I, J, K, L, M, N, O, P, Q, R, S, T, U, V, W, X, Y, Z, $, _, ab, bb, cb, db, eb, fb, gb, hb, ib, jb, kb, lb, mb, nb, c = a.extend({}, a.fn.slide.defaults, b),
				d = a(this),
				e = c.effect,
				f = a(c.prevCell, d),
				g = a(c.nextCell, d),
				h = a(c.pageStateCell, d),
				i = a(c.playStateCell, d),
				j = a(c.titCell, d),
				k = j.length,
				l = a(c.mainCell, d),
				m = l.children().length,
				n = c.switchLoad,
				o = a(c.targetCell, d),
				p = parseInt(c.defaultIndex),
				q = parseInt(c.delayTime),
				r = parseInt(c.interTime);
			if(parseInt(c.triggerTime), t = parseInt(c.scroll), u = "false" == c.autoPlay || 0 == c.autoPlay ? !1 : !0, v = "false" == c.opp || 0 == c.opp ? !1 : !0, w = "false" == c.autoPage || 0 == c.autoPage ? !1 : !0, x = "false" == c.pnLoop || 0 == c.pnLoop ? !1 : !0, y = "false" == c.mouseOverStop || 0 == c.mouseOverStop ? !1 : !0, z = "false" == c.defaultPlay || 0 == c.defaultPlay ? !1 : !0, A = "false" == c.returnDefault || 0 == c.returnDefault ? !1 : !0, B = isNaN(c.vis) ? 1 : parseInt(c.vis), C = !-[1] && !window.XMLHttpRequest, D = 0, E = 0, F = 0, G = 0, H = c.easing, I = null, J = null, K = null, L = c.titOnClassName, M = j.index(d.find("." + L)), N = p = -1 == M ? p : M, O = p, P = p, Q = m >= B ? 0 != m % t ? m % t : t : 0, S = "leftMarquee" == e || "topMarquee" == e ? !0 : !1, T = function() {
					a.isFunction(c.startFun) && c.startFun(p, k, d, a(c.titCell, d), l, o, f, g)
				}, U = function() {
					a.isFunction(c.endFun) && c.endFun(p, k, d, a(c.titCell, d), l, o, f, g)
				}, V = function() {
					j.removeClass(L), z && j.eq(O).addClass(L)
				}, "menu" == c.type) return z && j.removeClass(L).eq(p).addClass(L), j.hover(function() {
				R = a(this).find(c.targetCell);
				var b = j.index(a(this));
				J = setTimeout(function() {
					switch(p = b, j.removeClass(L).eq(p).addClass(L), T(), e) {
						case "fade":
							R.stop(!0, !0).animate({
								opacity: "show"
							}, q, H, U);
							break;
						case "slideDown":
							R.stop(!0, !0).animate({
								height: "show"
							}, q, H, U)
					}
				}, c.triggerTime)
			}, function() {
				switch(clearTimeout(J), e) {
					case "fade":
						R.animate({
							opacity: "hide"
						}, q, H);
						break;
					case "slideDown":
						R.animate({
							height: "hide"
						}, q, H)
				}
			}), A && d.hover(function() {
				clearTimeout(K)
			}, function() {
				K = setTimeout(V, q)
			}), void 0;
			if(0 == k && (k = m), S && (k = 2), w) {
				if(m >= B ? "leftLoop" == e || "topLoop" == e ? k = 0 != m % t ? (0 ^ m / t) + 1 : m / t : (W = m - B, k = 1 + parseInt(0 != W % t ? W / t + 1 : W / t), 0 >= k && (k = 1)) : k = 1, j.html(""), X = "", 1 == c.autoPage || "true" == c.autoPage)
					for(Y = 0; k > Y; Y++) X += "<li>" + (Y + 1) + "</li>";
				else
					for(Y = 0; k > Y; Y++) X += c.autoPage.replace("$", Y + 1);
				j.html(X), j = j.children()
			}
			if(m >= B) switch(l.children().each(function() {
				a(this).width() > F && (F = a(this).width(), E = a(this).outerWidth(!0)), a(this).height() > G && (G = a(this).height(), D = a(this).outerHeight(!0))
			}), Z = l.children(), $ = function() {
				var a;
				for(a = 0; B > a; a++) Z.eq(a).clone().addClass("clone").appendTo(l);
				for(a = 0; Q > a; a++) Z.eq(m - a - 1).clone().addClass("clone").prependTo(l)
			}, e) {
				case "fold":
					l.css({
						position: "relative",
						width: E,
						height: D
					}).children().css({
						position: "absolute",
						width: F,
						left: 0,
						top: 0,
						display: "none"
					});
					break;
				case "top":
					l.wrap('<div class="tempWrap" style="overflow:hidden; position:relative; height:' + B * D + 'px"></div>').css({
						top: -(p * t) * D,
						position: "relative",
						padding: "0",
						margin: "0"
					}).children().css({
						height: G
					});
					break;
				case "left":
					l.wrap('<div class="tempWrap" style="overflow:hidden; position:relative; width:' + B * E + 'px"></div>').css({
						width: m * E,
						left: -(p * t) * E,
						position: "relative",
						overflow: "hidden",
						padding: "0",
						margin: "0"
					}).children().css({
						"float": "left",
						width: F
					});
					break;
				case "leftLoop":
				case "leftMarquee":
					$(), l.wrap('<div class="tempWrap" style="overflow:hidden; position:relative; width:' + B * E + 'px"></div>').css({
						width: (m + B + Q) * E,
						position: "relative",
						overflow: "hidden",
						padding: "0",
						margin: "0",
						left: -(Q + p * t) * E
					}).children().css({
						"float": "left",
						width: F
					});
					break;
				case "topLoop":
				case "topMarquee":
					$(), l.wrap('<div class="tempWrap" style="overflow:hidden; position:relative; height:' + B * D + 'px"></div>').css({
						height: (m + B + Q) * D,
						position: "relative",
						padding: "0",
						margin: "0",
						top: -(Q + p * t) * D
					}).children().css({
						height: G
					})
			}
			_ = function(a) {
				var b = a * t;
				return a == k ? b = m : -1 == a && 0 != m % t && (b = -m % t), b
			}, ab = function(b) {
				var d, f, g, h, c = function(c) {
					for(var d = c; B + c > d; d++) b.eq(d).find("img[" + n + "]").each(function() {
						var c, d, b = a(this);
						if(b.attr("src", b.attr(n)).removeAttr(n), l.find(".clone")[0])
							for(c = l.children(), d = 0; d < c.length; d++) c.eq(d).find("img[" + n + "]").each(function() {
								a(this).attr(n) == b.attr("src") && a(this).attr("src", a(this).attr(n)).removeAttr(n)
							})
					})
				};
				switch(e) {
					case "fade":
					case "fold":
					case "top":
					case "left":
					case "slideDown":
						c(p * t);
						break;
					case "leftLoop":
					case "topLoop":
						c(Q + _(P));
						break;
					case "leftMarquee":
					case "topMarquee":
						d = "leftMarquee" == e ? l.css("left").replace("px", "") : l.css("top").replace("px", ""), f = "leftMarquee" == e ? E : D, g = Q, 0 != d % f && (h = Math.abs(0 ^ d / f), g = 1 == p ? Q + h : Q + h - 1), c(g)
				}
			}, bb = function(a) {
				var b, c, d;
				if(!z || N != p || a || S) {
					if(S ? p >= 1 ? p = 1 : 0 >= p && (p = 0) : (P = p, p >= k ? p = 0 : 0 > p && (p = k - 1)), T(), null != n && ab(l.children()), o[0] && (R = o.eq(p), null != n && ab(o), "slideDown" == e ? (o.not(R).stop(!0, !0).slideUp(q), R.slideDown(q, H, function() {
							l[0] || U()
						})) : (o.not(R).stop(!0, !0).hide(), R.animate({
							opacity: "show"
						}, q, function() {
							l[0] || U()
						}))), m >= B) switch(e) {
						case "fade":
							l.children().stop(!0, !0).eq(p).animate({
								opacity: "show"
							}, q, H, function() {
								U()
							}).siblings().hide();
							break;
						case "fold":
							l.children().stop(!0, !0).eq(p).animate({
								opacity: "show"
							}, q, H, function() {
								U()
							}).siblings().animate({
								opacity: "hide"
							}, q, H);
							break;
						case "top":
							l.stop(!0, !1).animate({
								top: -p * t * D
							}, q, H, function() {
								U()
							});
							break;
						case "left":
							l.stop(!0, !1).animate({
								left: -p * t * E
							}, q, H, function() {
								U()
							});
							break;
						case "leftLoop":
							b = P, l.stop(!0, !0).animate({
								left: -(_(P) + Q) * E
							}, q, H, function() {
								-1 >= b ? l.css("left", -(Q + (k - 1) * t) * E) : b >= k && l.css("left", -Q * E), U()
							});
							break;
						case "topLoop":
							b = P, l.stop(!0, !0).animate({
								top: -(_(P) + Q) * D
							}, q, H, function() {
								-1 >= b ? l.css("top", -(Q + (k - 1) * t) * D) : b >= k && l.css("top", -Q * D), U()
							});
							break;
						case "leftMarquee":
							c = l.css("left").replace("px", ""), 0 == p ? l.animate({
								left: ++c
							}, 0, function() {
								l.css("left").replace("px", "") >= 0 && l.css("left", -m * E)
							}) : l.animate({
								left: --c
							}, 0, function() {
								l.css("left").replace("px", "") <= -(m + Q) * E && l.css("left", -Q * E)
							});
							break;
						case "topMarquee":
							d = l.css("top").replace("px", ""), 0 == p ? l.animate({
								top: ++d
							}, 0, function() {
								l.css("top").replace("px", "") >= 0 && l.css("top", -m * D)
							}) : l.animate({
								top: --d
							}, 0, function() {
								l.css("top").replace("px", "") <= -(m + Q) * D && l.css("top", -Q * D)
							})
					}
					j.removeClass(L).eq(p).addClass(L), N = p, x || (g.removeClass("nextStop"), f.removeClass("prevStop"), 0 == p && f.addClass("prevStop"), p == k - 1 && g.addClass("nextStop")), h.html("<span>" + (p + 1) + "</span>/" + k)
				}
			}, z && bb(!0), A && d.hover(function() {
				clearTimeout(K)
			}, function() {
				K = setTimeout(function() {
					p = O, z ? bb() : "slideDown" == e ? R.slideUp(q, V) : R.animate({
						opacity: "hide"
					}, q, V), N = p
				}, 300)
			}), cb = function(a) {
				I = setInterval(function() {
					v ? p-- : p++, bb()
				}, a ? a : r)
			}, db = function(a) {
				I = setInterval(bb, a ? a : r)
			}, eb = function() {
				y || !u || i.hasClass("pauseState") || (clearInterval(I), cb())
			}, fb = function() {
				(x || p != k - 1) && (p++, bb(), S || eb())
			}, gb = function() {
				(x || 0 != p) && (p--, bb(), S || eb())
			}, hb = function() {
				clearInterval(I), S ? db() : cb(), i.removeClass("pauseState")
			}, ib = function() {
				clearInterval(I), i.addClass("pauseState")
			}, u ? S ? (v ? p-- : p++, db(), y && l.hover(ib, hb)) : (cb(), y && d.hover(ib, hb)) : (S && (v ? p-- : p++), i.addClass("pauseState")), i.click(function() {
				i.hasClass("pauseState") ? hb() : ib()
			}), "mouseover" == c.trigger ? j.hover(function() {
				var a = j.index(this);
				J = setTimeout(function() {
					p = a, bb(), eb()
				}, c.triggerTime)
			}, function() {
				clearTimeout(J)
			}) : j.click(function() {
				p = j.index(this), bb(), eb()
			}), S ? (g.mousedown(fb), f.mousedown(gb), x && (kb = function() {
				jb = setTimeout(function() {
					clearInterval(I), db(0 ^ r / 10)
				}, 150)
			}, lb = function() {
				clearTimeout(jb), clearInterval(I), db()
			}, g.mousedown(kb), g.mouseup(lb), f.mousedown(kb), f.mouseup(lb)), "mouseover" == c.trigger && (g.hover(fb, function() {}), f.hover(gb, function() {}))) : (g.click(fb), f.click(gb)), "auto" != c.vis || 1 != t || "left" != e && "leftLoop" != e || (nb = function() {
				C && (l.width("auto"), l.children().width("auto")), l.parent().width("auto"), E = l.parent().width(), C && l.parent().width(E), l.children().width(E), "left" == e ? (l.width(E * m), l.stop(!0, !1).animate({
					left: -p * E
				}, 0)) : (l.width(E * (m + 2)), l.stop(!0, !1).animate({
					left: -(p + 1) * E
				}, 0)), C || E == l.parent().width() || nb()
			}, a(window).resize(function() {
				clearTimeout(mb), mb = setTimeout(nb, 100)
			}), nb())
		})
	}
}(jQuery), jQuery.easing["jswing"] = jQuery.easing["swing"], jQuery.extend(jQuery.easing, {
	def: "easeOutQuad",
	swing: function(a, b, c, d, e) {
		return jQuery.easing[jQuery.easing.def](a, b, c, d, e)
	},
	easeInQuad: function(a, b, c, d, e) {
		return d * (b /= e) * b + c
	},
	easeOutQuad: function(a, b, c, d, e) {
		return -d * (b /= e) * (b - 2) + c
	},
	easeInOutQuad: function(a, b, c, d, e) {
		return(b /= e / 2) < 1 ? d / 2 * b * b + c : -d / 2 * (--b * (b - 2) - 1) + c
	},
	easeInCubic: function(a, b, c, d, e) {
		return d * (b /= e) * b * b + c
	},
	easeOutCubic: function(a, b, c, d, e) {
		return d * ((b = b / e - 1) * b * b + 1) + c
	},
	easeInOutCubic: function(a, b, c, d, e) {
		return(b /= e / 2) < 1 ? d / 2 * b * b * b + c : d / 2 * ((b -= 2) * b * b + 2) + c
	},
	easeInQuart: function(a, b, c, d, e) {
		return d * (b /= e) * b * b * b + c
	},
	easeOutQuart: function(a, b, c, d, e) {
		return -d * ((b = b / e - 1) * b * b * b - 1) + c
	},
	easeInOutQuart: function(a, b, c, d, e) {
		return(b /= e / 2) < 1 ? d / 2 * b * b * b * b + c : -d / 2 * ((b -= 2) * b * b * b - 2) + c
	},
	easeInQuint: function(a, b, c, d, e) {
		return d * (b /= e) * b * b * b * b + c
	},
	easeOutQuint: function(a, b, c, d, e) {
		return d * ((b = b / e - 1) * b * b * b * b + 1) + c
	},
	easeInOutQuint: function(a, b, c, d, e) {
		return(b /= e / 2) < 1 ? d / 2 * b * b * b * b * b + c : d / 2 * ((b -= 2) * b * b * b * b + 2) + c
	},
	easeInSine: function(a, b, c, d, e) {
		return -d * Math.cos(b / e * (Math.PI / 2)) + d + c
	},
	easeOutSine: function(a, b, c, d, e) {
		return d * Math.sin(b / e * (Math.PI / 2)) + c
	},
	easeInOutSine: function(a, b, c, d, e) {
		return -d / 2 * (Math.cos(Math.PI * b / e) - 1) + c
	},
	easeInExpo: function(a, b, c, d, e) {
		return 0 == b ? c : d * Math.pow(2, 10 * (b / e - 1)) + c
	},
	easeOutExpo: function(a, b, c, d, e) {
		return b == e ? c + d : d * (-Math.pow(2, -10 * b / e) + 1) + c
	},
	easeInOutExpo: function(a, b, c, d, e) {
		return 0 == b ? c : b == e ? c + d : (b /= e / 2) < 1 ? d / 2 * Math.pow(2, 10 * (b - 1)) + c : d / 2 * (-Math.pow(2, -10 * --b) + 2) + c
	},
	easeInCirc: function(a, b, c, d, e) {
		return -d * (Math.sqrt(1 - (b /= e) * b) - 1) + c
	},
	easeOutCirc: function(a, b, c, d, e) {
		return d * Math.sqrt(1 - (b = b / e - 1) * b) + c
	},
	easeInOutCirc: function(a, b, c, d, e) {
		return(b /= e / 2) < 1 ? -d / 2 * (Math.sqrt(1 - b * b) - 1) + c : d / 2 * (Math.sqrt(1 - (b -= 2) * b) + 1) + c
	},
	easeInElastic: function(a, b, c, d, e) {
		var f = 1.70158,
			g = 0,
			h = d;
		return 0 == b ? c : 1 == (b /= e) ? c + d : (g || (g = .3 * e), h < Math.abs(d) ? (h = d, f = g / 4) : f = g / (2 * Math.PI) * Math.asin(d / h), -(h * Math.pow(2, 10 * (b -= 1)) * Math.sin((b * e - f) * 2 * Math.PI / g)) + c)
	},
	easeOutElastic: function(a, b, c, d, e) {
		var f = 1.70158,
			g = 0,
			h = d;
		return 0 == b ? c : 1 == (b /= e) ? c + d : (g || (g = .3 * e), h < Math.abs(d) ? (h = d, f = g / 4) : f = g / (2 * Math.PI) * Math.asin(d / h), h * Math.pow(2, -10 * b) * Math.sin((b * e - f) * 2 * Math.PI / g) + d + c)
	},
	easeInOutElastic: function(a, b, c, d, e) {
		var f = 1.70158,
			g = 0,
			h = d;
		return 0 == b ? c : 2 == (b /= e / 2) ? c + d : (g || (g = e * .3 * 1.5), h < Math.abs(d) ? (h = d, f = g / 4) : f = g / (2 * Math.PI) * Math.asin(d / h), 1 > b ? -.5 * h * Math.pow(2, 10 * (b -= 1)) * Math.sin((b * e - f) * 2 * Math.PI / g) + c : .5 * h * Math.pow(2, -10 * (b -= 1)) * Math.sin((b * e - f) * 2 * Math.PI / g) + d + c)
	},
	easeInBack: function(a, b, c, d, e, f) {
		return void 0 == f && (f = 1.70158), d * (b /= e) * b * ((f + 1) * b - f) + c
	},
	easeOutBack: function(a, b, c, d, e, f) {
		return void 0 == f && (f = 1.70158), d * ((b = b / e - 1) * b * ((f + 1) * b + f) + 1) + c
	},
	easeInOutBack: function(a, b, c, d, e, f) {
		return void 0 == f && (f = 1.70158), (b /= e / 2) < 1 ? d / 2 * b * b * (((f *= 1.525) + 1) * b - f) + c : d / 2 * ((b -= 2) * b * (((f *= 1.525) + 1) * b + f) + 2) + c
	},
	easeInBounce: function(a, b, c, d, e) {
		return d - jQuery.easing.easeOutBounce(a, e - b, 0, d, e) + c
	},
	easeOutBounce: function(a, b, c, d, e) {
		return(b /= e) < 1 / 2.75 ? d * 7.5625 * b * b + c : 2 / 2.75 > b ? d * (7.5625 * (b -= 1.5 / 2.75) * b + .75) + c : 2.5 / 2.75 > b ? d * (7.5625 * (b -= 2.25 / 2.75) * b + .9375) + c : d * (7.5625 * (b -= 2.625 / 2.75) * b + .984375) + c
	},
	easeInOutBounce: function(a, b, c, d, e) {
		return e / 2 > b ? .5 * jQuery.easing.easeInBounce(a, 2 * b, 0, d, e) + c : .5 * jQuery.easing.easeOutBounce(a, 2 * b - e, 0, d, e) + .5 * d + c
	}
});