import { componentDef } from "@spryker-oryx/utilities";

export const pie2Component = componentDef({
    name: "oryx-pie2",
    impl: () => import("./pie2.component.js").then((m) => m.Pie2Component),
});
