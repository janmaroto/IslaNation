import { Storage } from "@capacitor/storage";

export async function setStorage(key: string, value: any): Promise<void> {
    Storage.set({ key: key, value: JSON.stringify(value) });
}

export async function getStorage(key: string): Promise<any> {
    const item = await Storage.get({ key: key });
    return JSON.parse(item.value);
}

export async function removeStorage(key: string): Promise<void> {
    await Storage.remove({ key: key });
}