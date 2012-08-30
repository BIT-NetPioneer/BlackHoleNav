tips = new Array(
    "那些杀不死我的，只会让我更强",
    "繁忙的蜜蜂没有时间悲哀",
    "数学的本质在于它的自由",
    "Why so serious?",
    "所有信息都应该是自由的"
);
index = Math.floor(Math.random() * tips.length);
window.document.title += " - "+tips[index];
