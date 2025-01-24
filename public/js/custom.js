var tl;
gsap.delayedCall(0.2, play);

function play() {
	gsap.to("body", { opacity: 1, duration: 0.2 });
	tl = gsap.timeline({ onComplete: createTimeline });
}
function createTimeline() {
	gsap.set("svg"[0], { opacity: 1 });
	gsap.utils.toArray(".anim").forEach((element) => {
		tl.add(createTween(element));
	});

	return tl;
}

function createTween(element) {
	tl.set(element, { opacity: 1 });
	tl.set(element, { opacity: 0, delay: element.dataset.number });
	return tl;
}

createTimeline();
