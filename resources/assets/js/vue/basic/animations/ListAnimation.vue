<script>
    import ErrorHandler from "../system/ErrorHandler";
    export default {
        name: "ListAnimation",
        mixins: [ErrorHandler],
        methods: {
            //添加移除 class 类名，监听 transitionend 事件。
            beforeEnter(dom) {
                this.showSyncIndicator();
                dom.classList.add('list-enter', 'list-enter-active');
            },
            enter(dom,done) {
                let delay = dom.dataset.delay;
                setTimeout(function () {
                    dom.classList.remove('list-enter');
                    dom.classList.add('list-enter-to');
                    //监听 transitionend 事件
                    let transitionend = window.ontransitionend ? "transitionend" : "webkitTransitionEnd";
                    dom.addEventListener(transitionend, function onEnd() {
                        dom.removeEventListener(transitionend, onEnd);
                        done(); //调用done() 告诉vue动画已完成，以触发 afterEnter 钩子
                    });
                }, delay)
            },
            afterEnter(dom) {
                dom.classList.remove('list-enter-to', 'list-enter-active');
                if (dom.dataset.last) {
                    this.$emit('animation', false);
                    this.hideIndicator();
                }
            },
            setDelay: function (index, prePage) {
                return (index　%　prePage) * 100;
            }
        }
    }
</script>
