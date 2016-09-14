/**
 * Created by TAKESHI on 2016/08/07.
 */
/**
 * Markdown 解析
 *
 * @param input
 * @param preview
 * @constructor
 */
function MarkDownToHtml(input, preview) {
    this.update = function () {
        preview.innerHTML = markdown.toHTML(input.value);
    };
    input.editor = this;
    this.update();
}