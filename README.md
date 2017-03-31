# Tamce's Personal Website
## Target
 实现博客内容，包括：
 1. 文章
 2. 评论
 3. 主页按时间挑选文章展示
 4. 文章归档

 想法： 全站静态化（评论区及主页(?)除外）  
 **实现思路：**  
 * 从某一入口触发更新动作更新文章内容、主页内容；
 * 文章、主页内容使用 `markdown` 存储在文件中。
 * 不同目录下根据一配置文件决定静态化时使用的模板 (?)
 * 动态部分通过不同的 `uri` 来动态获取

 **目录组织：**  
 * 所有需要被访问到的文件放置在 `public` 下直接作为网页根访问。
 * 模板文件组织在 `content/template` 内。
 * `markdown` 文件组织在 `content/blog` 内。
 * 提供获取动态内容的入口，暂定以 `api` 处理 -> `/api/*` 全部 `rewrite` 到 `/api/index.php`。

## Todos
 [ ] 根据不同目录下的配置读取模板
 [ ] Markdown 解析和转换到网页
 [ ] 动态内容的 Entry