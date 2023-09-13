import { componentDef } from "@spryker-oryx/utilities";

export const pieComponent = componentDef({
    name: "oryx-pie",
    impl: () => import("./pie.component.js").then((m) => m.PieComponent),
});