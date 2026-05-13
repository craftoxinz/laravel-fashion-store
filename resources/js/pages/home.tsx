import { Head } from "@inertiajs/react";

export default function Home({ name }: { name: string }) {
    return (
        <>
            <Head title="Home" />
            <h1>Hello World! {name}</h1>
        </>
    );
}
